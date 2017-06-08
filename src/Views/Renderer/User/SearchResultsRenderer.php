<?php
/**
 * Created by PhpStorm.
 * User: Poradzisz Marcin
 * Project twitter
 * Date: 08.06.2017
 * Time: 10:20
 */

namespace Twitter\Views\Renderer\User;



use Twitter\Views\Renderer\Interfaces\RenderInterfaceWithObject;

class SearchResultsRenderer implements RenderInterfaceWithObject
{
    public function render($results)
    {

        if ($results==null)
        {
            echo "<p>Brak wynikow wyszukiwania</p>";
        }

        else
        {
            echo "<h3>Wyniki wyszukiwania</h3>";
            foreach ($results as $result)
            {
                $id = $result["id"];
                $name = $result ["name"];
                $email = $result ["email"];

                echo "<p>Imie: <a target='_blank' href=index.php?user=view&id=$id>$name</a></p>";
                echo " <p>Email: $email</p>";
            }
        }
    }


}