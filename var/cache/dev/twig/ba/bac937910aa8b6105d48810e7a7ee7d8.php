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

/* service_manage/index.html.twig */
class __TwigTemplate_6cadd3c4b18fd1131436bb26e678173c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "service_manage/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "service_manage/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "service_manage/index.html.twig", 1);
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

        echo "Service Management Dashboard";
        
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
        <h1>Service Management Dashboard</h1>

        <div class=\"mb-3\">
            <form method=\"get\" action=\"";
        // line 10
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_service_manage");
        echo "\">
                <div class=\"input-group\">
                    <input type=\"text\" name=\"search\" class=\"form-control\" placeholder=\"Zoek klanten...\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 12, $this->source); })()), "request", [], "any", false, false, false, 12), "query", [], "any", false, false, false, 12), "get", ["search", ""], "method", false, false, false, 12), "html", null, true);
        echo "\">
                    <button type=\"submit\" class=\"btn btn-primary\">Zoeken</button>
                </div>
            </form>
        </div>

        <div class=\"mb-3\">
            <div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\">
                <button type=\"button\" class=\"btn btn-primary\" data-filter=\"all\">Alle</button>
                <button type=\"button\" class=\"btn btn-primary\" data-filter=\"Abonnement\">Abonnement</button>
                <button type=\"button\" class=\"btn btn-primary\" data-filter=\"Contract\">Contract</button>
            </div>
        </div>

        <div class=\"scrollable-table\">
            <table class=\"table\">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Telefoonnummer</th>
                    <th>Type</th>
                    <th>Acties</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 39
        if ( !twig_test_empty((isset($context["klanten"]) || array_key_exists("klanten", $context) ? $context["klanten"] : (function () { throw new RuntimeError('Variable "klanten" does not exist.', 39, $this->source); })()))) {
            // line 40
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["klanten"]) || array_key_exists("klanten", $context) ? $context["klanten"] : (function () { throw new RuntimeError('Variable "klanten" does not exist.', 40, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["klant"]) {
                // line 41
                echo "                        <tr data-type=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["klant"], "type", [], "any", false, false, false, 41), "html", null, true);
                echo "\">
                            <td>";
                // line 42
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["klant"], "id", [], "any", false, false, false, 42), "html", null, true);
                echo "</td>
                            <td>";
                // line 43
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["klant"], "naam", [], "any", false, false, false, 43), "html", null, true);
                echo "</td>
                            <td>";
                // line 44
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["klant"], "email", [], "any", false, false, false, 44), "html", null, true);
                echo "</td>
                            <td>";
                // line 45
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["klant"], "telefoonnummer", [], "any", false, false, false, 45), "html", null, true);
                echo "</td>
                            <td>";
                // line 46
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["klant"], "type", [], "any", false, false, false, 46), "html", null, true);
                echo "</td>
                            <td>
                                <a href=\"";
                // line 48
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("klant_verwijderen", ["id" => twig_get_attribute($this->env, $this->source, $context["klant"], "id", [], "any", false, false, false, 48)]), "html", null, true);
                echo "\" class=\"btn btn-danger\" onclick=\"return confirm('Weet je zeker dat je deze klant wilt verwijderen?');\">Verwijderen</a>
                                ";
                // line 49
                if ((twig_get_attribute($this->env, $this->source, $context["klant"], "type", [], "any", false, false, false, 49) == "Contract")) {
                    // line 50
                    echo "                                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("contract_index", ["id" => twig_get_attribute($this->env, $this->source, $context["klant"], "id", [], "any", false, false, false, 50)]), "html", null, true);
                    echo "\" class=\"btn btn-primary\">Details</a>
                                ";
                } elseif ((twig_get_attribute($this->env, $this->source,                 // line 51
$context["klant"], "type", [], "any", false, false, false, 51) == "Abonnement")) {
                    // line 52
                    echo "                                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("abbo_bewerken", ["id" => twig_get_attribute($this->env, $this->source, $context["klant"], "id", [], "any", false, false, false, 52)]), "html", null, true);
                    echo "\" class=\"btn btn-primary\">Bewerken</a>
                                ";
                } else {
                    // line 54
                    echo "                                    <a href=\"#\" class=\"btn btn-primary\">Details</a>
                                ";
                }
                // line 56
                echo "                            </td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['klant'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 59
            echo "                ";
        } else {
            // line 60
            echo "                    <tr>
                        <td colspan=\"6\">Geen klanten gevonden.</td>
                    </tr>
                ";
        }
        // line 64
        echo "                </tbody>
            </table>
        </div>

        <a href=\"";
        // line 68
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("klant_nieuw");
        echo "\" class=\"btn btn-primary\">Nieuwe Klant Toevoegen</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.btn-group button');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filterValue = this.dataset.filter;
                    const rows = document.querySelectorAll('tbody tr');

                    rows.forEach(row => {
                        if (filterValue === 'all') {
                            row.style.display = 'table-row';
                        } else {
                            const type = row.dataset.type;

                            if (type === filterValue) {
                                row.style.display = 'table-row';
                            } else {
                                row.style.display = 'none';
                            }
                        }
                    });
                });
            });
        });
    </script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "service_manage/index.html.twig";
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
        return array (  208 => 68,  202 => 64,  196 => 60,  193 => 59,  185 => 56,  181 => 54,  175 => 52,  173 => 51,  168 => 50,  166 => 49,  162 => 48,  157 => 46,  153 => 45,  149 => 44,  145 => 43,  141 => 42,  136 => 41,  131 => 40,  129 => 39,  99 => 12,  94 => 10,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Service Management Dashboard{% endblock %}

{% block body %}
    <div class=\"container\">
        <h1>Service Management Dashboard</h1>

        <div class=\"mb-3\">
            <form method=\"get\" action=\"{{ path('app_service_manage') }}\">
                <div class=\"input-group\">
                    <input type=\"text\" name=\"search\" class=\"form-control\" placeholder=\"Zoek klanten...\" value=\"{{ app.request.query.get('search', '') }}\">
                    <button type=\"submit\" class=\"btn btn-primary\">Zoeken</button>
                </div>
            </form>
        </div>

        <div class=\"mb-3\">
            <div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\">
                <button type=\"button\" class=\"btn btn-primary\" data-filter=\"all\">Alle</button>
                <button type=\"button\" class=\"btn btn-primary\" data-filter=\"Abonnement\">Abonnement</button>
                <button type=\"button\" class=\"btn btn-primary\" data-filter=\"Contract\">Contract</button>
            </div>
        </div>

        <div class=\"scrollable-table\">
            <table class=\"table\">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Telefoonnummer</th>
                    <th>Type</th>
                    <th>Acties</th>
                </tr>
                </thead>
                <tbody>
                {% if klanten is not empty %}
                    {% for klant in klanten %}
                        <tr data-type=\"{{ klant.type }}\">
                            <td>{{ klant.id }}</td>
                            <td>{{ klant.naam }}</td>
                            <td>{{ klant.email }}</td>
                            <td>{{ klant.telefoonnummer }}</td>
                            <td>{{ klant.type }}</td>
                            <td>
                                <a href=\"{{ path('klant_verwijderen', { 'id': klant.id }) }}\" class=\"btn btn-danger\" onclick=\"return confirm('Weet je zeker dat je deze klant wilt verwijderen?');\">Verwijderen</a>
                                {% if klant.type == 'Contract' %}
                                    <a href=\"{{ path('contract_index', { 'id': klant.id }) }}\" class=\"btn btn-primary\">Details</a>
                                {% elseif klant.type == 'Abonnement' %}
                                    <a href=\"{{ path('abbo_bewerken', { 'id': klant.id }) }}\" class=\"btn btn-primary\">Bewerken</a>
                                {% else %}
                                    <a href=\"#\" class=\"btn btn-primary\">Details</a>
                                {% endif %}
                            </td>
                        </tr>
                    {% endfor %}
                {% else %}
                    <tr>
                        <td colspan=\"6\">Geen klanten gevonden.</td>
                    </tr>
                {% endif %}
                </tbody>
            </table>
        </div>

        <a href=\"{{ path('klant_nieuw') }}\" class=\"btn btn-primary\">Nieuwe Klant Toevoegen</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.btn-group button');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filterValue = this.dataset.filter;
                    const rows = document.querySelectorAll('tbody tr');

                    rows.forEach(row => {
                        if (filterValue === 'all') {
                            row.style.display = 'table-row';
                        } else {
                            const type = row.dataset.type;

                            if (type === filterValue) {
                                row.style.display = 'table-row';
                            } else {
                                row.style.display = 'none';
                            }
                        }
                    });
                });
            });
        });
    </script>
{% endblock %}
", "service_manage/index.html.twig", "C:\\Users\\noah-\\zand1\\WeatherApp\\templates\\service_manage\\index.html.twig");
    }
}
