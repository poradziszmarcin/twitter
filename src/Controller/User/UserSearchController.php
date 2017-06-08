<?php
/**
 * Created by PhpStorm.
 * User: coder
 * Date: 07.06.2017
 * Time: 11:41
 */

namespace Twitter\Controller\User;


use Twitter\Model\DBase\UserDB;
use Twitter\Views\Renderer\User\SearchResultsRenderer;

class UserSearchController
{
   public function getMethod()
   {
       if (isset($_GET["user"]) == true && isset($_GET["searchBy"])==true)  {

           $searchBy = trim($_GET["searchBy"]);
           $searchInput = $_GET["searchInput"];

           if (strlen($searchInput)<=4)
           {
               echo "Your question is to short, minimum lenght is 5 letters";
           }

           else {


               switch ($searchBy) {

                   case "name":

                       $userDB = new UserDB();
                       $result = $userDB->searchByName($searchInput);
                       $resultsRenderer = new SearchResultsRenderer();
                       $resultsRenderer->render($result);
                       break;

                   case "email":
                       $userDB = new UserDB();
                       $result = $userDB->searchByEmail($searchInput);
                       $resultsRenderer = new SearchResultsRenderer();
                       $resultsRenderer->render($result);

                       break;

                   default:
                       echo "invalid operation";
                       break;

               }
           }

       }
   }
}