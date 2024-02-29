<?php

namespace Tests\Feature\Api;

use App\Models\Todo;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TodoControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @test
     */
    public function Todoの新規作成()
    {
        $params = [
            'title' => 'テスト:タイトル',
            'content' => 'テスト:内容'
        ];

        $res = $this->postJson(route('api.todo.create'), $params);
        $res->assertOk();
        $todos = Todo::all();

        $this->assertCount(1, $todos);

        $todo = $todos->first();

        $this->assertEquals($params['title'], $todo->title);
        $this->assertEquals($params['content'], $todo->content);
    }

    public function パラメータが空によるTodoの新規作成失敗()
    {

        $res = $this->postJson(route('api.todo.create'), []);
        $res->assertStatus(422);

    }

    public function Todoの更新()
    {
        
        $params = [
            'title' => 'テスト:タイトル',
            'content' => 'テスト:内容'
        ];

        $id = Todo::factory()->create();
        $res = $this->patchJson(route('api.todo.update', ['id' => $id]), $params);
        $res->assertOk();
        $todos = Todo::all();

        $this->assertCount(1, $todos);

        $todo = $todos->first();

        $this->assertEquals($params['title'], $todo->title);
        $this->assertEquals($params['content'], $todo->content);

    }

    public function Todoの更新失敗()
    {
        
        $id = Todo::factory()->create();
        $res = $this->patchJson(route('api.todo.update', ['id' => $id]), []);
        $res->assertStatus(422);

    }
  
    public function Todoの詳細取得()
    {
        
        $todo = Todo::factory()->create();
        $id = $todo->id;
        $res = $this->getJson(route('api.todo.show', ['id' => $id ]));
        $res->assertOk();

        $data = $res->json();

        $this->assertSame($todo->title, $data['title']);
        $this->assertSame($todo->content, $data['content']);
    }

    public function 存在しないTodoの詳細取得失敗()
    {
        
        $todo = Todo::factory()->create();
        $id = $todo->id;
        $res = $this->getJson(route('api.todo.show', ['id' => $id + 1]));
        $res->assertStatus(404);
    }

    public function Todoの削除()
    {

        $todo = Todo::factory()->create();
        $id = $todo->id;
        $res = $this->deleteJson(route('api.todo.destroy', ['id' => $id]));
        $res->assertOk();
        $todos = Todo::all();

        $this->assertNull(Todo::find($id));

    }
    
    public function 存在しないTodoの削除失敗()
    {

        $todo = Todo::factory()->create();
        $id = $todo->id;
        $res = $this->deleteJson(route('api.todo.destroy', ['id' => $id + 1]));
        $res->assertStatus(404);

    }
}
