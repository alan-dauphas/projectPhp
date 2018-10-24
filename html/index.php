<?php
require('controller/frontend.php');

if (isset($_GET['action']))
{
    if ($_GET['action'] == 'listPosts')
    {
        listPosts();
    }

    elseif ($_GET['action'] == 'post')
    {
        if (isset($_GET['id']) && $_GET['id'] > 0)
        {
            post();
        }
        else
        {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }

    elseif ($_GET['action'] == 'addComment')
    {
        if (isset($_GET['id']) && $_GET['id'] > 0)
        {
            if (!empty($_POST['author']) && !empty($_POST['comment']))
            {
                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else
            {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else
        {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }

    elseif($_GET['action'] == 'registration')
    {
      if ($_GET['action'] == 'registration' && isset($_GET['confirmation']) && $_GET['confirmation'] == 'confirm')
      {
        if (!empty($_POST['name']) && !empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['pass']))
        {
          addMembers($_POST['name'], $_POST['pseudo'], $_POST['mail'], $_POST['pass']);
        }
        else
        {
          echo 'Erreur : tous les champs ne sont pas remplis !';
        }
      }
      else
      {
        signIn();
      }
    }

}
else
{
    listPosts();
}
