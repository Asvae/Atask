/**
 * Skill diagram mouseover
 */
(function () {
    var $output_field = $('div.output-skills-diagram');
    var $skills_diagram = $('div.skills-diagram');

    $skills_diagram.find("dl dt").on( "mouseover", function() {
        $output_field.html("<h3>" + $(this).text() + "</h3><div>" + this.dataset.content + "</div>");
    });

    $output_field.height($skills_diagram.height());

    $( window ).on('resize scroll', function (){
        $output_field.height($skills_diagram.height());
    });
})();


//# sourceMappingURL=all.js.map