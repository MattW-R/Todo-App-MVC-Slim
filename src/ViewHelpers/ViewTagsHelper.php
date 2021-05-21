<?php

namespace App\ViewHelpers;

class ViewTagsHelper {
    public static function displayAllTags(array $tags): string {
        $tagListHTML = '';
        if ($tags) {
            foreach ($tags as $tag) {
                $tagListHTML  .= '<div>';
                $tagListHTML  .= '<form method="post" action="tags/edit">';
                $tagListHTML  .= '<input class="todo" name="name" type="text" value="' . $tag['name'] . '" data-current-value="' . $tag['name'] . '" />';
                $tagListHTML  .= '<input hidden name="id" value="' . $tag['id'] . '" />';
                $tagListHTML  .= '</form>';
                $tagListHTML  .= '</div>';
            }
        }
        return $tagListHTML;
    }

    public static function displayNewTag(): string {
        $tagListHTML  = '<div>';
        $tagListHTML  .= '<form method="post" action="tags/add">';
        $tagListHTML  .= '<input class="todo" type="text" name="tag" />';
        $tagListHTML  .= '</form>';
        $tagListHTML  .= '</div>';
        return $tagListHTML;
    }
}