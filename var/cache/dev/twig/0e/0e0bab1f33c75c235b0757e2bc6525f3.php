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

/* @Autocomplete/autocomplete_form_theme.html.twig */
class __TwigTemplate_cc17b4cad0f4be986ffad20108ca1272 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'ux_entity_autocomplete_widget' => [$this, 'block_ux_entity_autocomplete_widget'],
            'ux_entity_autocomplete_label' => [$this, 'block_ux_entity_autocomplete_label'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Autocomplete/autocomplete_form_theme.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Autocomplete/autocomplete_form_theme.html.twig"));

        // line 2
        $this->displayBlock('ux_entity_autocomplete_widget', $context, $blocks);
        // line 9
        echo "
";
        // line 10
        $this->displayBlock('ux_entity_autocomplete_label', $context, $blocks);
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 2
    public function block_ux_entity_autocomplete_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ux_entity_autocomplete_widget"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ux_entity_autocomplete_widget"));

        // line 3
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "autocomplete", [], "any", true, true, false, 3)) {
            // line 4
            echo "        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 4, $this->source); })()), "autocomplete", [], "any", false, false, false, 4), 'widget', ["attr" => twig_array_merge(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 4, $this->source); })()), "autocomplete", [], "any", false, false, false, 4), "vars", [], "any", false, false, false, 4), "attr", [], "any", false, false, false, 4), ["required" => (isset($context["required"]) || array_key_exists("required", $context) ? $context["required"] : (function () { throw new RuntimeError('Variable "required" does not exist.', 4, $this->source); })())])]);
            echo "
    ";
        } else {
            // line 6
            echo "        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 6, $this->source); })()), 'widget');
            echo "
    ";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 10
    public function block_ux_entity_autocomplete_label($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ux_entity_autocomplete_label"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ux_entity_autocomplete_label"));

        // line 11
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "autocomplete", [], "any", true, true, false, 11)) {
            // line 12
            echo "        ";
            $context["id"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 12, $this->source); })()), "autocomplete", [], "any", false, false, false, 12), "vars", [], "any", false, false, false, 12), "id", [], "any", false, false, false, 12);
            // line 13
            echo "    ";
        }
        // line 14
        echo "    ";
        $this->displayBlock("form_label", $context, $blocks);
        echo "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "@Autocomplete/autocomplete_form_theme.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  112 => 14,  109 => 13,  106 => 12,  103 => 11,  93 => 10,  79 => 6,  73 => 4,  70 => 3,  60 => 2,  50 => 10,  47 => 9,  45 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# EasyAdminAutocomplete form type #}
{% block ux_entity_autocomplete_widget %}
    {% if form.autocomplete is defined %}
        {{ form_widget(form.autocomplete, {attr: form.autocomplete.vars.attr|merge({required: required})}) }}
    {% else %}
        {{ form_widget(form) }}
    {% endif %}
{% endblock ux_entity_autocomplete_widget %}

{% block ux_entity_autocomplete_label %}
    {% if form.autocomplete is defined %}
        {% set id = form.autocomplete.vars.id %}
    {% endif %}
    {{ block('form_label') }}
{% endblock ux_entity_autocomplete_label %}
", "@Autocomplete/autocomplete_form_theme.html.twig", "C:\\Users\\noah-\\zand1\\WeatherApp\\vendor\\symfony\\ux-autocomplete\\templates\\autocomplete_form_theme.html.twig");
    }
}
