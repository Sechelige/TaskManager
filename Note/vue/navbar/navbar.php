<?php
$utilisateurid = $_SESSION['utilisateurid'];
?>
<head>
    <link rel='stylesheet' href='../../css/style.css' />
    <link rel='stylesheet' href='../../css/navbar.css' />
</head>
<body>
    <header>
        <nav>
  
              <div class='logo'>
              TaskManager
            </div>
        <ul class='burger'>
            <li><a href='../../vue/global/vue.php?id=<?=$utilisateurid?>'>Notes</a></li>
            <li><a href=''>Tâches</a></li>
            <li><a href=''>Projets</a></li>
        </ul>
      </nav>
      </header>
</body>

