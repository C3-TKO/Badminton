<?php

/* AppBundle:Security:login.html.twig */
class __TwigTemplate_97ed514983ce9e91fdf0cbede5eabf9c14ef52a7f1ea18e297a1b711d8b9818a extends Twig_Template
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
            'body_id' => array($this, 'block_body_id'),
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

    // line 2
    public function block_body_id($context, array $blocks = array())
    {
        // line 3
        echo "    id=\"login\"
";
    }

    // line 6
    public function block_body($context, array $blocks = array())
    {
        // line 7
        echo "    <div class=\"center-block\">
        <div class=\"well\">
            <form class=\"form-horizontal\" action=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"post\">

                <fieldset>
                    <legend>Please log in</legend>

                    <div class=\"form-group\">
                        <div class=\"col-lg-12\">
                            <label class=\"sr-only\" for=\"username\">Username</label>
                            <div class=\"input-group\">
                                <div class=\"input-group-addon\"><span><i class=\"fa fa-user fa-fw fa-lg\"></i></span></div>
                                <input id=\"username\" type=\"text\" name=\"_username\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" placeholder=\"Username\" class=\"form-control\" />
                            </div>
                        </div>
                    </div>

                    <div class=\"form-group\">
                        <div class=\"col-lg-12\">
                            <label class=\"sr-only\" for=\"password\">Password</label>
                            <div class=\"input-group\">
                                <div class=\"input-group-addon\"><i class=\"fa fa-key fa-fw fa-lg\"></i></div>
                                <input id=\"password\" type=\"password\" name=\"_password\" placeholder=\"Password\" class=\"form-control\" />
                            </div>
                        </div>
                    </div>

                    <div class=\"form-group\">
                        <div class=\"col-lg-12\">
                            <button type=\"submit\" class=\"btn btn-primary btn-block\"><i class=\"fa fa-sign-in fa-fw fa-lg\"></i> Login</button>
                        </div>
                    </div>

                    <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('form')->renderCsrfToken("authenticate"), "html", null, true);
        echo "\" />
                </fieldset>
            </form>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 40,  65 => 19,  52 => 9,  48 => 7,  45 => 6,  40 => 3,  37 => 2,  11 => 1,);
    }
}
