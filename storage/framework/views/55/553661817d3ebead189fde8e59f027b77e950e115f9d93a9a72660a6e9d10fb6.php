<?php

/* home/index.html */
class __TwigTemplate_be777cf2925bd1144f84a33b80212f12f7a21d43f7a034638d9a02a6227a1883 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["posts"]) ? $context["posts"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 2
            echo "    * ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "body", array()), "html", null, true);
            echo " <br />
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 4
            echo "    No posts.
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "home/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 4,  24 => 2,  19 => 1,);
    }
}
/* {% for post in posts %}*/
/*     * {{ post.body }} <br />*/
/* {% else %}*/
/*     No posts.*/
/* {% endfor %}*/
