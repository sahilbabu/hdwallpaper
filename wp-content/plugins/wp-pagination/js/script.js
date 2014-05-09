 /**
 * jQuery jPages Custom Script v0.1
 * Client side pagination with jQuery
 *
 *
 */
jQuery(document).ready(function() {
    jQuery(".gallery").each(function(){

        jQuery( "<div class='gallery-holder clear'>" ).insertBefore( ".gallery" );
        jQuery( "<div class='gallery-holder clear'>" ).insertAfter( ".gallery" );

        id = jQuery(this).attr('id');

        jQuery( ".gallery br" ).remove(); // remove br tag from Gallery

        jQuery("div.gallery-holder").jPages({
                containerID: id
        });



    });

    /**
     * Custom javascript for comments pagination
     *
     *
     */
    jQuery( "<div class='comment-list-holder clear'>" ).insertBefore( "#comment-list" );
    jQuery( "<div class='comment-list-holder clear'>" ).insertAfter( "#comment-list" );
    jQuery("div.comment-list-holder").jPages({
            containerID : "comment-list",
            perPage : jPages_comment.get_comment_pages_count
    });

    /**
     * Custom javascript for any div pagination
     *
     *
     */
    jQuery( "<div class='holder clear'>" ).insertBefore( "#jpages-list" );
    jQuery( "<div class='holder clear'>" ).insertAfter( "#jpages-list" );
    jQuery("div.holder").jPages({
            containerID : "jpages-list",
            perPage : 1
    });

    /**
     * Custom javascript for Table
     * Add id jpages-table to table
     * Added id jpages-table-body-list to tbody
     *
     */
    jQuery( "<div class='jpages-table-holder clear'>" ).insertBefore( "#jpages-table" );
    jQuery( "<div class='jpages-table-holder clear'>" ).insertAfter( "#jpages-table" );
    jQuery("div.jpages-table-holder").jPages({
            containerID : "jpages-table-body-list"
    });

});
