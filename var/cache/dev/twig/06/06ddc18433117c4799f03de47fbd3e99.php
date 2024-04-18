<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* security/login.html.twig */
class __TwigTemplate_a11e30afcd2764eaa976564ff6bddfc2 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "security/login.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Log in!";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "
<main>
    <div class=\"container my-5 container-h\">
        <div class=\"vertical-center\">
            <div class=\"row\">
                <div class=\"col-6\">
                    <form method=\"post\" class=\"register-form float-end col-8\">
                        <h1 class=\"h2 mb-3\">Login</h1>
                        ";
        // line 14
        if ((isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 14, $this->source); })())) {
            // line 15
            echo "                            <div class=\"alert alert-danger mb-3\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 15, $this->source); })()), "messageKey", [], "any", false, false, false, 15), twig_get_attribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 15, $this->source); })()), "messageData", [], "any", false, false, false, 15), "security"), "html", null, true);
            echo "</div>
                        ";
        }
        // line 17
        echo "                        <div class=\"mb-3\">
                            <span class=\"me-2\"><span class=\"material-icons\">mail</span></span>
                            <input type=\"email\" name=\"email\" id=\"inputEmail\" class=\"form-control d-inline w-75\" autocomplete=\"email\" placeholder=\"Email\" required autofocus>
                        </div>
                        <div class=\"mb-3\">
                            <span class=\"me-2\"><span class=\"material-icons\">lock</span></span>
                            <input type=\"password\" name=\"password\" id=\"inputPassword\" class=\"form-control d-inline w-75\" placeholder=\"Wachtwoord\" autocomplete=\"current-password\" required>
                            <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        echo "\">
                        </div>
                        <div class=\"mb-3\">
                            <a class=\"a-link text-primary fw-bold\" href=\"#\">Wachtwoord vergeten?</a>
                        </div>
                        <div><button class=\"btn btn-primary px-5\" type=\"submit\">Login</button></div>
                    </form>
                </div>
                <div class=\"col-6 border-line\">
                    <img src=\"https://i.postimg.cc/X7L8GXnL/LogoIWA.jpg\" alt=\"logo\">
                </div>
            </div>
        </div>
    </div>
</main>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "security/login.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  115 => 24,  106 => 17,  100 => 15,  98 => 14,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Log in!{% endblock %}

{% block body %}

<main>
    <div class=\"container my-5 container-h\">
        <div class=\"vertical-center\">
            <div class=\"row\">
                <div class=\"col-6\">
                    <form method=\"post\" class=\"register-form float-end col-8\">
                        <h1 class=\"h2 mb-3\">Login</h1>
                        {% if error %}
                            <div class=\"alert alert-danger mb-3\">{{ error.messageKey|trans(error.messageData, 'security') }}</div>
                        {% endif %}
                        <div class=\"mb-3\">
                            <span class=\"me-2\"><span class=\"material-icons\">mail</span></span>
                            <input type=\"email\" name=\"email\" id=\"inputEmail\" class=\"form-control d-inline w-75\" autocomplete=\"email\" placeholder=\"Email\" required autofocus>
                        </div>
                        <div class=\"mb-3\">
                            <span class=\"me-2\"><span class=\"material-icons\">lock</span></span>
                            <input type=\"password\" name=\"password\" id=\"inputPassword\" class=\"form-control d-inline w-75\" placeholder=\"Wachtwoord\" autocomplete=\"current-password\" required>
                            <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token('authenticate') }}\">
                        </div>
                        <div class=\"mb-3\">
                            <a class=\"a-link text-primary fw-bold\" href=\"#\">Wachtwoord vergeten?</a>
                        </div>
                        <div><button class=\"btn btn-primary px-5\" type=\"submit\">Login</button></div>
                    </form>
                </div>
                <div class=\"col-6 border-line\">
                    <img src=\"https://i.postimg.cc/X7L8GXnL/LogoIWA.jpg\" alt=\"logo\">
                </div>
            </div>
        </div>
    </div>
</main>

{% endblock %}
", "security/login.html.twig", "C:\\Users\\noah-\\zand1\\WeatherApp\\templates\\security\\login.html.twig");
    }
}
