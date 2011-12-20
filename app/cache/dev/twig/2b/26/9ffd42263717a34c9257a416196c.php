<?php

/* ToxDMBundle:Default:index.html.twig */
class __TwigTemplate_2b269ffd42263717a34c9257a416196c extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "Hello ";
        echo twig_escape_filter($this->env, $this->getContext($context, "name"), "html", null, true);
        echo "!
";
    }

    public function getTemplateName()
    {
        return "ToxDMBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
