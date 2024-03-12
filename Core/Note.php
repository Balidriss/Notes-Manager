<?php

namespace Core;

use Core\App;
use Core\Database;

class Note
{
    public function store($body, $user_id)
    {
        App::resolve(Database::class)->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $body,
            'user_id' => $user_id
        ]);
    }
    public function delete($note_id, $user_id)
    {
        $note = App::resolve(Database::class)->query('SELECT * FROM notes WHERE id = :id', [
            'id' => $note_id
        ])->findOrFail();

        authorize((int)$note['user_id'] === $user_id);

        App::resolve(Database::class)->query(
            'DELETE FROM notes WHERE id = :id',
            ['id' => $note_id]
        );
    }
    public function show($note_id, $user_id)
    {
        $note = App::resolve(Database::class)->query('SELECT * FROM notes WHERE id = :id', [
            'id' => $note_id
        ])->findOrFail();

        authorize((int)$note['user_id'] === $user_id);
        return $note;
    }
    public function edit($note_id, $user_id)
    {
        $note = App::resolve(Database::class)->query('SELECT * FROM notes WHERE id = :id', [
            'id' => $note_id
        ])->findOrFail();

        authorize((int)$note['user_id'] === $user_id);
        return $note;
    }
    public function update($body, $note_id, $user_id)
    {

        App::resolve(Database::class)->query('UPDATE notes SET body = :body WHERE id = :id', ['body' => $body, 'id' => $note_id]);
    }
}
