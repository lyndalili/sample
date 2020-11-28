/*! This file is auto-generated */
jQuery(document).ready(function(h){var c,g=wp.i18n.__;function w(e,t){e.children().addClass("hidden"),e.children("."+t).removeClass("hidden")}function T(e){e.removeClass("has-request-results"),e.next().hasClass("request-results")&&e.next().remove()}function x(e,t,o,a){var s="",n="request-results";T(e),a.length&&(h.each(a,function(e,t){s=s+"<li>"+t+"</li>"}),s="<ul>"+s+"</ul>"),e.addClass("has-request-results"),e.hasClass("status-request-confirmed")&&(n+=" status-request-confirmed"),e.hasClass("status-request-failed")&&(n+=" status-request-failed"),e.after(function(){return'<tr class="'+n+'"><th colspan="5"><div class="notice inline notice-alt '+t+'"><p>'+o+"</p>"+s+"</div></td></tr>"})}h(".export-personal-data-handle").click(function(e){var t=h(this),n=t.parents(".export-personal-data"),r=t.parents("tr"),a=r.find(".export-progress"),i=t.parents(".row-actions"),c=n.data("request-id"),d=n.data("nonce"),u=n.data("exporters-count"),l=!!n.data("send-as-email");function p(e){var t=g("An error occurred while attempting to export personal data.");w(n,"export-personal-data-failed"),e&&x(r,"notice-error",t,[e]),setTimeout(function(){i.removeClass("processing")},500)}function m(e){var t=0<u?e/u:0,o=Math.round(100*t).toString()+"%";a.html(o)}e.preventDefault(),e.stopPropagation(),i.addClass("processing"),n.blur(),T(r),m(0),w(n,"export-personal-data-processing"),function o(a,s){h.ajax({url:window.ajaxurl,data:{action:"wp-privacy-export-personal-data",exporter:a,id:c,page:s,security:d,sendAsEmail:l},method:"post"}).done(function(e){var t=e.data;e.success?t.done?(m(a),a<u?setTimeout(o(a+1,1)):setTimeout(function(){!function(e){var t=g("The personal data export link for this user was sent.");w(n,"export-personal-data-success"),x(r,"notice-success",t,[]),void 0!==e?window.location=e:l||p(g("No personal data export file was generated.")),setTimeout(function(){i.removeClass("processing")},500)}(t.url)},500)):setTimeout(o(a,s+1)):setTimeout(function(){p(e.data)},500)}).fail(function(e,t,o){setTimeout(function(){p(o)},500)})}(1,1)}),h(".remove-personal-data-handle").click(function(e){var t=h(this),n=t.parents(".remove-personal-data"),r=t.parents("tr"),a=r.find(".erasure-progress"),i=t.parents(".row-actions"),c=n.data("request-id"),d=n.data("nonce"),u=n.data("erasers-count"),l=!1,p=!1,m=[];function f(){var e=g("An error occurred while attempting to find and erase personal data.");w(n,"remove-personal-data-failed"),x(r,"notice-error",e,[]),setTimeout(function(){i.removeClass("processing")},500)}function v(e){var t=0<u?e/u:0,o=Math.round(100*t).toString()+"%";a.html(o)}e.preventDefault(),e.stopPropagation(),i.addClass("processing"),n.blur(),T(r),v(0),w(n,"remove-personal-data-processing"),function o(a,s){h.ajax({url:window.ajaxurl,data:{action:"wp-privacy-erase-personal-data",eraser:a,id:c,page:s,security:d},method:"post"}).done(function(e){var t=e.data;e.success?(t.items_removed&&(l=l||t.items_removed),t.items_retained&&(p=p||t.items_retained),t.messages&&(m=m.concat(t.messages)),t.done?(v(a),a<u?setTimeout(o(a+1,1)):setTimeout(function(){!function(){var e=g("No personal data was found for this user."),t="notice-success";w(n,"remove-personal-data-success"),!1===l?!1===p?e=g("No personal data was found for this user."):(e=g("Personal data was found for this user but was not erased."),t="notice-warning"):!1===p?e=g("All of the personal data found for this user was erased."):(e=g("Personal data was found for this user but some of the personal data found was not erased."),t="notice-warning"),x(r,t,e,m),setTimeout(function(){i.removeClass("processing")},500)}()},500)):setTimeout(o(a,s+1))):setTimeout(function(){f()},500)}).fail(function(){setTimeout(function(){f()},500)})}(1,1)}),h(document).on("click",function(e){var t,o,a,s=h(e.target),n=s.siblings(".success");if(clearTimeout(c),s.is("button.privacy-text-copy")&&((o=(t=s.parent().parent()).find("div.wp-suggested-text")).length||(o=t.find("div.policy-text")),o.length))try{var r=document.documentElement.scrollTop,i=document.body.scrollTop;window.getSelection().removeAllRanges(),a=document.createRange(),o.addClass("hide-privacy-policy-tutorial"),a.selectNodeContents(o[0]),window.getSelection().addRange(a),document.execCommand("copy"),o.removeClass("hide-privacy-policy-tutorial"),window.getSelection().removeAllRanges(),0<r&&r!==document.documentElement.scrollTop?document.documentElement.scrollTop=r:0<i&&i!==document.body.scrollTop&&(document.body.scrollTop=i),n.addClass("visible"),wp.a11y.speak(g("The section has been copied to your clipboard.")),c=setTimeout(function(){n.removeClass("visible")},3e3)}catch(e){}})});