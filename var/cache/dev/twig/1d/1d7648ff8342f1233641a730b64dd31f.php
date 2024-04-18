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

/* klant/klant_nieuw.html.twig */
class __TwigTemplate_6d70c664a3144f1b551b128c2d0df5f6 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "klant/klant_nieuw.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "klant/klant_nieuw.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "klant/klant_nieuw.html.twig", 1);
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

        echo "Nieuwe Klant";
        
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
        echo "    <div class=\"container\">
        <h1 class=\"my-4 fw-bold\">Nieuwe Klant Toevoegen</h1>

        <form method=\"post\" action=\"";
        // line 9
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("klant_nieuw");
        echo "\" class=\"my-4\">
            <div class=\"row mb-3\">
                <label for=\"type-select\" class=\"col-sm-2 col-form-label\"></label>
                <div class=\"col-sm-10\">
                    ";
        // line 13
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 13, $this->source); })()), "type", [], "any", false, false, false, 13), 'row', ["attr" => ["id" => "type-select", "class" => "form-control"]]);
        echo "
                </div>
            </div>
            <div class=\"row mb-3\">
                <label for=\"naam\" class=\"col-sm-2 col-form-label\"></label>
                <div class=\"col-sm-10\">
                    ";
        // line 19
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 19, $this->source); })()), "naam", [], "any", false, false, false, 19), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
                </div>
            </div>
            <div class=\"row mb-3\">
                <label for=\"email\" class=\"col-sm-2 col-form-label\"></label>
                <div class=\"col-sm-10\">
                    ";
        // line 25
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 25, $this->source); })()), "email", [], "any", false, false, false, 25), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
                </div>
            </div>
            <div class=\"row mb-3\">
                <label for=\"telefoonnummer\" class=\"col-sm-2 col-form-label\"></label>
                <div class=\"col-sm-10\">
                    ";
        // line 31
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 31, $this->source); })()), "telefoonnummer", [], "any", false, false, false, 31), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
                </div>
            </div>
            <div id=\"date-fields\" class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\"></label>
                <div class=\"col-sm-4\">
                    ";
        // line 37
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 37, $this->source); })()), "startdatum", [], "any", false, false, false, 37), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
                </div>
                <label class=\"col-sm-2 col-form-label\"></label>
                <div class=\"col-sm-4\">
                    ";
        // line 41
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 41, $this->source); })()), "einddatum", [], "any", false, false, false, 41), 'row', ["attr" => ["class" => "form-control"]]);
        echo "
                </div>
            </div>

            <div class=\"row\">
                <div class=\"col-sm-10 offset-sm-2\">
                    <button type=\"submit\" class=\"btn btn-success\">Opslaan</button>
                </div>
            </div>
        </form>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "klant/klant_nieuw.html.twig";
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
        return array (  143 => 41,  136 => 37,  127 => 31,  118 => 25,  109 => 19,  100 => 13,  93 => 9,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Nieuwe Klant{% endblock %}

{% block body %}
    <div class=\"container\">
        <h1 class=\"my-4 fw-bold\">Nieuwe Klant Toevoegen</h1>

        <form method=\"post\" action=\"{{ path('klant_nieuw') }}\" class=\"my-4\">
            <div class=\"row mb-3\">
                <label for=\"type-select\" class=\"col-sm-2 col-form-label\"></label>
                <div class=\"col-sm-10\">
                    {{ form_row(form.type, {'attr': {'id': 'type-select', 'class': 'form-control'}}) }}
                </div>
            </div>
            <div class=\"row mb-3\">
                <label for=\"naam\" class=\"col-sm-2 col-form-label\"></label>
                <div class=\"col-sm-10\">
                    {{ form_row(form.naam, {'attr': {'class': 'form-control'}}) }}
                </div>
            </div>
            <div class=\"row mb-3\">
                <label for=\"email\" class=\"col-sm-2 col-form-label\"></label>
                <div class=\"col-sm-10\">
                    {{ form_row(form.email, {'attr': {'class': 'form-control'}}) }}
                </div>
            </div>
            <div class=\"row mb-3\">
                <label for=\"telefoonnummer\" class=\"col-sm-2 col-form-label\"></label>
                <div class=\"col-sm-10\">
                    {{ form_row(form.telefoonnummer, {'attr': {'class': 'form-control'}}) }}
                </div>
            </div>
            <div id=\"date-fields\" class=\"row mb-3\">
                <label class=\"col-sm-2 col-form-label\"></label>
                <div class=\"col-sm-4\">
                    {{ form_row(form.startdatum, {'attr': {'class': 'form-control'}}) }}
                </div>
                <label class=\"col-sm-2 col-form-label\"></label>
                <div class=\"col-sm-4\">
                    {{ form_row(form.einddatum, {'attr': {'class': 'form-control'}}) }}
                </div>
            </div>

            <div class=\"row\">
                <div class=\"col-sm-10 offset-sm-2\">
                    <button type=\"submit\" class=\"btn btn-success\">Opslaan</button>
                </div>
            </div>
        </form>
    </div>
{% endblock %}
", "klant/klant_nieuw.html.twig", "C:\\Users\\noah-\\zand1\\WeatherApp\\templates\\klant\\klant_nieuw.html.twig");
    }
}
