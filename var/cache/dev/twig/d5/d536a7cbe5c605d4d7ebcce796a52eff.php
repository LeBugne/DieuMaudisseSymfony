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

/* header.html.twig */
class __TwigTemplate_8eae23c0c2980cd01b0f6eb12d536cfe extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "header.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "header.html.twig"));

        // line 1
        echo "<div id=\"header\">
    <table>
        <tr>
            <td width=\"10%\"><a href=\"";
        // line 4
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home_page");
        echo "\"><img src=";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/img/logo.png"), "html", null, true);
        echo " alt=\"logo eco-presto\" float=\"left\" width=\"150px\"/></a></td>
            <td width=\"10%\"><h1><a href=\"";
        // line 5
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home_page");
        echo "\">EcoPresto</a></h1></td>
            <td align=\"right\" width=\"10%\">
                <div class=\"aligner\">
                    <a href=\"";
        // line 8
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        echo "\"><img src=";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/img/bonhomme.png"), "html", null, true);
        echo " alt=\"logo eco-presto\" float=\"right\" width=\"50px\"/></a>
                    <p>";
        // line 9
        if (twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 9, $this->source); })()), "user", [], "any", false, false, false, 9)) {
            // line 10
            echo "                        Connecté en tant que ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 10, $this->source); })()), "user", [], "any", false, false, false, 10), "login", [], "any", false, false, false, 10), "html", null, true);
            echo "
                    ";
        } else {
            // line 12
            echo "                        Non connecté
                    ";
        }
        // line 13
        echo "</p>
                </div>
            </td>
        </tr>
    </table>
</div>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "header.html.twig";
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
        return array (  78 => 13,  74 => 12,  68 => 10,  66 => 9,  60 => 8,  54 => 5,  48 => 4,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"header\">
    <table>
        <tr>
            <td width=\"10%\"><a href=\"{{ path(\"app_home_page\")}}\"><img src={{asset('/img/logo.png')}} alt=\"logo eco-presto\" float=\"left\" width=\"150px\"/></a></td>
            <td width=\"10%\"><h1><a href=\"{{ path(\"app_home_page\")}}\">EcoPresto</a></h1></td>
            <td align=\"right\" width=\"10%\">
                <div class=\"aligner\">
                    <a href=\"{{ path(\"app_login\")}}\"><img src={{asset('/img/bonhomme.png')}} alt=\"logo eco-presto\" float=\"right\" width=\"50px\"/></a>
                    <p>{% if app.user %}
                        Connecté en tant que {{ app.user.login }}
                    {% else %}
                        Non connecté
                    {% endif %}</p>
                </div>
            </td>
        </tr>
    </table>
</div>", "header.html.twig", "/home/mael/Bureau/PPIL/EcoPret/templates/header.html.twig");
    }
}
