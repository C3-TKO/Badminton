<?php

/* AppBundle:Default:add_game.html.twig */
class __TwigTemplate_54dc58849fff4db484aaa72f1c5df456d509a52a1cf6d25ef616c9ada95de4a8 extends Twig_Template
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
        echo "
    ";
        // line 5
        if (((isset($context["game"]) ? $context["game"] : $this->getContext($context, "game")) != null)) {
            // line 6
            echo "    <div class=\"alert alert-success\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>
        <strong>Volltreffer!</strong> Das Spiel ";
            // line 8
            echo twig_escape_filter($this->env, (isset($context["game"]) ? $context["game"] : $this->getContext($context, "game")), "html", null, true);
            echo " wurde gespeichert!
    </div>
    ";
        }
        // line 11
        echo "
    ";
        // line 12
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("attr" => array("novalidate" => "novalidate")));
        echo "

        <fieldset>
            <legend>Spiel eintragen</legend>

            ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "

            <div class=\"row\">
                <div class=\"col-xs-12\">
                    <div class=\"form-group\">
                        ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "date", array()), 'errors');
        echo "
                        ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "date", array()), 'widget');
        echo "
                    </div>
                </div>

                <div class=\"col-xs-5\">
                    <div class=\"form-group\">
                        ";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "pata", array()), 'errors');
        echo "
                        ";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "pata", array()), 'widget');
        echo "
                    </div>
                    <div class=\"form-group\">
                        ";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "pbta", array()), 'errors');
        echo "
                        ";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "pbta", array()), 'widget');
        echo "
                    </div>
                </div>

                <div class=\"col-xs-2 form-group\">
                    <p class=\"form-control-static text-center\">vs.</p>
                </div>

                <div class=\"col-xs-5\">
                    <div class=\"form-group\">
                        ";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "patb", array()), 'errors');
        echo "
                        ";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "patb", array()), 'widget');
        echo "
                    </div>

                    <div class=\"form-group\">
                        ";
        // line 49
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "pbtb", array()), 'errors');
        echo "
                        ";
        // line 50
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "pbtb", array()), 'widget');
        echo "
                    </div>
                </div>

                <div class=\"col-xs-3 form-group col-xs-offset-2\">
                    ";
        // line 55
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "score_team_a", array()), 'errors');
        echo "
                    ";
        // line 56
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "score_team_a", array()), 'widget', array("attr" => array("maxlength" => "2")));
        echo "
                </div>
                <div class=\"col-xs-2 form-group\">
                    <p class=\"form-control-static text-center\">:</p>
                </div>
                <div class=\"col-xs-3 form-group\">
                    ";
        // line 62
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "score_team_b", array()), 'errors');
        echo "
                    ";
        // line 63
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "score_team_b", array()), 'widget', array("attr" => array("maxlength" => "2")));
        echo "
                </div>

                <div class=\"col-xs-12 form-group\">
                    <div class=\"text-center\">
                        ";
        // line 68
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "create_schedule", array()), 'widget');
        echo "
                    </div>
                </div>

            </div>
        </fieldset>
    ";
        // line 74
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Default:add_game.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  170 => 74,  161 => 68,  153 => 63,  149 => 62,  140 => 56,  136 => 55,  128 => 50,  124 => 49,  117 => 45,  113 => 44,  100 => 34,  96 => 33,  90 => 30,  86 => 29,  77 => 23,  73 => 22,  65 => 17,  57 => 12,  54 => 11,  48 => 8,  44 => 6,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
