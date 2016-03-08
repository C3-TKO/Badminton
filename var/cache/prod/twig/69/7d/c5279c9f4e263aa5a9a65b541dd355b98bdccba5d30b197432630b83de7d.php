<?php

/* AppBundle:Default:ranking.html.twig */
class __TwigTemplate_697dc5279c9f4e263aa5a9a65b541dd355b98bdccba5d30b197432630b83de7d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("AppBundle::layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AppBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"row\">
    <h4 class=\"col-xs-12\">Platzierung vom ";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "html", null, true);
        echo ":</h4>
</div>
<div class=\"row\">
    <div class=\"col-xs-12\">
        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Spieler</th>
                    <th>Siege</th>
                    <th>Quote</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["ranking"]) ? $context["ranking"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["rank"]) {
            // line 20
            echo "                <tr>
                    <td>
                        <span>";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($context["rank"], "positioning", array()), "html", null, true);
            echo "</span>
                    </td>
                    <td>
                        <i class=\"fa fa-trophy fa-fw trophy-positioning-";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($context["rank"], "positioning", array()), "html", null, true);
            echo " ";
            if (($this->getAttribute($context["rank"], "positioning", array()) > 3)) {
                echo "icon-invisible";
            }
            echo "\"></i><span>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["rank"], "name", array()), "html", null, true);
            echo "</span>
                    </td>
                    <td>
                        <span>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["rank"], "games_won", array()), "html", null, true);
            echo "</span>
                    </td>
                    <td>
                        <span>";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($context["rank"], "win_ratio", array()), "html", null, true);
            echo " %</span>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rank'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "            </tbody>
        </table>
    </div>
</div>
";
        // line 39
        $this->env->loadTemplate("AppBundle::pagination.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "AppBundle:Default:ranking.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 39,  101 => 35,  91 => 31,  85 => 28,  73 => 25,  67 => 22,  63 => 20,  59 => 19,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
