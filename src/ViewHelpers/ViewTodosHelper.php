<?php

namespace App\ViewHelpers;

class ViewTodosHelper {
    public static function displayAllTodos(array $todos, array $tags, string $filterTags): string {
        $todoListHTML = '';
        if ($todos) {
            foreach ($todos as $todo) {
                $todoListHTML .= '<div>';
                $todoListHTML .= '<form method="post" action="todos/edit">';
                $todoListHTML .= '<input class="todo' . ($todo['done'] == 1 ? ' done' : '') .'" name="todo" type="text" value="' . $todo['todo'] . '" data-current-value="' . $todo['todo'] . '" />';
                $todoListHTML .= '<input hidden name="id" value="' . $todo['id'] . '" />';
                $todoListHTML .= '<input hidden name="done" value="' . ($todo['done'] == 1 ? '0' : '1') . '" />';
                $todoListHTML .= '</form>';
                foreach ($tags as $tag) {
                    $active = false;
                    foreach (explode(',', $todo['tags']) as $activeTagId) {
                        if ($tag['id'] == $activeTagId) {
                            $active = true;
                            break;
                        }
                    }
                    $todoListHTML .= '<form action="todos/edit/' . ($active ? 'removetag' : 'addtag') . '" method="post">';
                    $todoListHTML .= '<span class="tag-button' . ($active ? ' active' : '') . (preg_match("/{$tag['name']}/", $filterTags) ? ' filtered' : '') . '">' . $tag['name'] . '</span>';
                    $todoListHTML .= '<input hidden name="id" value="' . $todo['id'] . '" />';
                    $todoListHTML .= '<input hidden name="tagId" value="' . $tag['id'] . '" />';
                    $todoListHTML .= '</form>';
                }
                $todoListHTML .= '</div>';
            }
        }
        return $todoListHTML;
    }

    public static function displayNewTodo(): string {
        $todoListHTML = '<div>';
        $todoListHTML .= '<form method="post" action="todos/add">';
        $todoListHTML .= '<input class="todo" type="text" name="todo" />';
        $todoListHTML .= '</form>';
        $todoListHTML .= '</div>';
        return $todoListHTML;
    }
}