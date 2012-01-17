<?php

/* index/index.twig */
class __TwigTemplate_f9e4d530906997942a3549c90ac82ccd extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div id=\"welcome\">
    <h1>Welcome to the <span id=\"zf-name\">Zend Framework!</span></h1>

    <h3>This is your project's main page</h3>

    <h4>Today is: ";
        // line 6
        if (isset($context["currentDateAndTime"])) { $_currentDateAndTime_ = $context["currentDateAndTime"]; } else { $_currentDateAndTime_ = null; }
        echo twig_escape_filter($this->env, $_currentDateAndTime_, "html", null, true);
        echo "</h4>

</div>";
    }

    public function getTemplateName()
    {
        return "index/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
