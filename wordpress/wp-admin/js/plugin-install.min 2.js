/*! This file is auto-generated */
jQuery(document).ready(function(o){var e,i,n,a,l,d=o(),s=o(".upload-view-toggle"),t=o(".wrap"),r=o(document.body);function c(){var t;n=o(":tabbable",i),a=e.find("#TB_closeWindowButton"),l=n.last(),(t=a.add(l)).off("keydown.wp-plugin-details"),t.on("keydown.wp-plugin-details",function(t){!function(t){if(9!==t.which)return;l[0]!==t.target||t.shiftKey?a[0]===t.target&&t.shiftKey&&(t.preventDefault(),l.focus()):(t.preventDefault(),a.focus())}(t)})}window.tb_position=function(){var t=o(window).width(),i=o(window).height()-(792<t?60:20),n=792<t?772:t-20;return(e=o("#TB_window")).length&&(e.width(n).height(i),o("#TB_iframeContent").width(n).height(i),e.css({"margin-left":"-"+parseInt(n/2,10)+"px"}),void 0!==document.body.style.maxWidth&&e.css({top:"30px","margin-top":"0"})),o("a.thickbox").each(function(){var t=o(this).attr("href");t&&(t=(t=t.replace(/&width=[0-9]+/g,"")).replace(/&height=[0-9]+/g,""),o(this).attr("href",t+"&width="+n+"&height="+i))})},o(window).resize(function(){tb_position()}),r.on("thickbox:iframe:loaded",e,function(){e.hasClass("plugin-details-modal")&&function(){var t=e.find("#TB_iframeContent");i=t.contents().find("body"),c(),a.focus(),o("#plugin-information-tabs a",i).on("click",function(){c()}),i.on("keydown",function(t){27===t.which&&tb_remove()})}()}).on("thickbox:removed",function(){d.focus()}),o(".wrap").on("click",".thickbox.open-plugin-details-modal",function(t){var i=o(this).data("title")?wp.i18n.sprintf(wp.i18n.__("Plugin: %s"),o(this).data("title")):wp.i18n.__("Plugin details");t.preventDefault(),t.stopPropagation(),d=o(this),tb_click.call(this),e.attr({role:"dialog","aria-label":wp.i18n.__("Plugin details")}).addClass("plugin-details-modal"),e.find("#TB_iframeContent").attr("title",i)}),o("#plugin-information-tabs a").click(function(t){var i=o(this).attr("name");t.preventDefault(),o("#plugin-information-tabs a.current").removeClass("current"),o(this).addClass("current"),"description"!==i&&o(window).width()<772?o("#plugin-information-content").find(".fyi").hide():o("#plugin-information-content").find(".fyi").show(),o("#section-holder div.section").hide(),o("#section-"+i).show()}),t.hasClass("plugin-install-tab-upload")||s.attr({role:"button","aria-expanded":"false"}).on("click",function(t){t.preventDefault(),r.toggleClass("show-upload-view"),s.attr("aria-expanded",r.hasClass("show-upload-view"))})});