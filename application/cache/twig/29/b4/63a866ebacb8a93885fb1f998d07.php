<?php

/* layout.phtml */
class __TwigTemplate_29b463a866ebacb8a93885fb1f998d07 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <title>The Next Social</title>
        <!-- Load Twitter Bootstrap and jQuery -->
        <link rel=\"stylesheet\" href=\"http://twitter.github.com/bootstrap/1.3.0/bootstrap.min.css\">
        <link rel=\"stylesheet\" href=\"css/style.css\">
        <script src=\"http://code.jquery.com/jquery-latest.min.js\"></script>
    </head>
    <body>
        <div id=\"site_container\" class=\"container\">

            <header id=\"header\">
                <div id=\"profile_info\">
                    <img src=\"img/avatar.jpg\" id=\"avatar\" alt=\"avatar\" />
                    <p>Welcome <strong>rzepak</strong>. <a href=\"#\">Log out?</a></p>
                    <p>System messages: 3. <a href=\"#\">Read?</a></p>
                    <p class=\"last_login\">Last login: 21:03 12.05.2009</p>
                </div>
                <div id=\"logo\">
                    <h1>
                        <a href=\"/\">AdmintTheme</a>
                    </h1>
                </div>
            </header>

            <div id=\"content\">
                <!-- Echo our content using Twig library -->
                ";
        // line 29
        echo $this->getAttribute($this->env->view->getHelper("layout")->layout(), "content");
        echo "
            </div>

            <footer id=\"footer\" class=\"clearfix\">
                <p class=\"left\">AdminTheme - Ultimate Admin Panel Solution</p>
                <p class=\"right\">© ";
        // line 34
        if (isset($context["currentDate"])) { $_currentDate_ = $context["currentDate"]; } else { $_currentDate_ = null; }
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $_currentDate_, "Y"), "html", null, true);
        echo " AdminTheme by rzepak</p>
            </footer>
        </div>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "layout.phtml";
    }

    public function isTraitable()
    {
        return false;
    }
}
