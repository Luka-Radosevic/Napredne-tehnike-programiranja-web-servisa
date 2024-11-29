<?php 
print '
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- End CSS -->
    <!-- Meta elements -->
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    
    <title>PHPProjektni</title>
</head>
<body>
    <header>
        <!-- Dynamically change hero image class based on menu selection -->
        <div class="' . (isset($_GET['menu']) && $_GET['menu'] > 1 ? 'hero-subimage' : 'hero-image') . '"></div>
        <nav>
            <ul>';
            
                $menuItems = [
                    1 => 'Home',
                    2 => 'News',
                    3 => 'Contact',
                    4 => 'About'
                ];
                
                foreach ($menuItems as $menuId => $menuName) {
                    $activeClass = (isset($_GET['menu']) && $_GET['menu'] == $menuId) ? ' class="active"' : '';
                    print "<li><a href=\"index.php?menu=$menuId\"$activeClass>$menuName</a></li>";
                }

            print '
            </ul>
        </nav>
    </header>

    <main>';
        
        $menu = isset($_GET['menu']) ? $_GET['menu'] : 1;

        switch ($menu) {
            case 2:
                include("news.php");
                break;
            case 3:
                include("contact.php");
                break;
            case 4:
                include("about-us.php");
                break;
            default:
                include("home.php");
                break;
        }

    print '
    </main>

    <footer>
        <p>Copyright &copy; ' . date("Y") . ' Alen Šimec. 
            <a href="https://github.com/Luka-Radosevic/Napredne-tehnike-programiranja-web-servisa">
                <img src="img/GitHub-Mark-Light-32px.png" title="Github" alt="Github">
            </a>
        </p>
    </footer>
</body>
</html>';
?>
