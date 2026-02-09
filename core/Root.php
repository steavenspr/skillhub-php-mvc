<?php

class Root
{
  public static function executer($url)
  {
    // Nettoyage de l'URL
    $url = htmlspecialchars(trim($url));
    $url = trim($url, "/");

    // Découpage de l'URL en tableau
    $tab = explode("/", $url);
    $class = $tab[0] . "Control"; // ⚠️ Ajout de "Control" pour respecter vos noms

    // ============================================
    // CAS 1 : URL avec "/" (class/method ou class/method/params)
    // ============================================
    if(is_numeric(strpos($url, "/"))){
      
      // Sous-cas 1a : Class + Method (sans paramètres)
      if(count($tab) == 2){
        if(file_exists("control/$class.php")){
          require_once "control/$class.php";
          $method = $tab[1];
          
          if(method_exists($class, $method)){
            $reflect = new ReflectionMethod($class, $method);
            $reflect->invoke(new $class);
          }else{
            echo "<h2 style='color:red'>La méthode $method n'existe pas dans $class</h2>";
          }
        }else{
          echo "<h2 style='color:red'>Le fichier $class.php n'existe pas</h2>";
        }
      }
      
      // Sous-cas 1b : Class + Method + Paramètres
      else{
        $param = [];
        $j = 0;

        // Extraction des paramètres (à partir de l'index 2)
        for($i = 2; $i < count($tab); $i++){
          $param[$j] = $tab[$i];
          $j++;
        }

        if(file_exists("control/$class.php")){
          require_once "control/$class.php";
          $method = $tab[1];
          
          if(method_exists($class, $method)){
            $reflect = new ReflectionMethod($class, $method);
            $nombre = $reflect->getNumberOfRequiredParameters();
            
            if(count($param) == $nombre){
              $reflect->invokeArgs(new $class, $param);
            }else{
              echo "<h2 style='color:red'>La méthode $method nécessite $nombre paramètre(s)</h2>";
            }
          }else{
            echo "<h2 style='color:red'>La méthode $method n'existe pas</h2>";
          }
        }else{
          echo "<h2 style='color:red'>Le fichier $class.php n'existe pas</h2>";
        }
      }
    }
    
    // ============================================
    // CAS 2 : URL simple (juste le nom du contrôleur)
    // ============================================
    else{
      if(file_exists("control/$class.php")){
        require_once "control/$class.php";
        $reflect = new ReflectionMethod($class, "index");
        $reflect->invoke(new $class);
      }else{
        echo "<h2 style='color:red'>Le fichier $class.php n'existe pas</h2>";
      }
    }
  }
}