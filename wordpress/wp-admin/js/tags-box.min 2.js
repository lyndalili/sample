/*! This file is auto-generated */
!function(r){var u=wp.i18n._x(",","tag delimiter")||",";window.array_unique_noempty=function(t){var a=[];return r.each(t,function(t,e){(e=r.trim(e))&&-1===r.inArray(e,a)&&a.push(e)}),a},window.tagBox={clean:function(t){return","!==u&&(t=t.replace(new RegExp(u,"g"),",")),t=t.replace(/\s*,\s*/g,",").replace(/,+/g,",").replace(/[,\s]+$/,"").replace(/^[,\s]+/,""),","!==u&&(t=t.replace(/,/g,u)),t},parseTags:function(t){var e=t.id.split("-check-num-")[1],a=r(t).closest(".tagsdiv"),i=a.find(".the-tags"),n=i.val().split(u),s=[];return delete n[e],r.each(n,function(t,e){(e=r.trim(e))&&s.push(e)}),i.val(this.clean(s.join(u))),this.quickClicks(a),!1},quickClicks:function(t){var e,n,a=r(".the-tags",t),s=r(".tagchecklist",t),c=r(t).attr("id");a.length&&(n=a.prop("disabled"),e=a.val().split(u),s.empty(),r.each(e,function(t,e){var a,i;(e=r.trim(e))&&(a=r("<li />").text(e),n||((i=r('<button type="button" id="'+c+"-check-num-"+t+'" class="ntdelbutton"><span class="remove-tag-icon" aria-hidden="true"></span><span class="screen-reader-text">'+wp.i18n.__("Remove term:")+" "+a.html()+"</span></button>")).on("click keypress",function(t){"click"!==t.type&&13!==t.keyCode&&32!==t.keyCode||(13!==t.keyCode&&32!==t.keyCode||r(this).closest(".tagsdiv").find("input.newtag").focus(),tagBox.userAction="remove",tagBox.parseTags(this))}),a.prepend("&nbsp;").prepend(i)),s.append(a))}),tagBox.screenReadersMessage())},flushTags:function(t,e,a){var i,n,s,c=r(".the-tags",t),o=r("input.newtag",t);return void 0===(s=(e=e||!1)?r(e).text():o.val())||""===s||(n=(i=c.val())?i+u+s:s,n=this.clean(n),n=array_unique_noempty(n.split(u)).join(u),c.val(n),this.quickClicks(t),e||o.val(""),void 0===a&&o.focus()),!1},get:function(a){var i=a.substr(a.indexOf("-")+1);r.post(ajaxurl,{action:"get-tagcloud",tax:i},function(t,e){0!==t&&"success"==e&&(t=r('<div id="tagcloud-'+i+'" class="the-tagcloud">'+t+"</div>"),r("a",t).click(function(){return tagBox.userAction="add",tagBox.flushTags(r("#"+i),this),!1}),r("#"+a).after(t))})},userAction:"",screenReadersMessage:function(){var t;switch(this.userAction){case"remove":t=wp.i18n.__("Term removed.");break;case"add":t=wp.i18n.__("Term added.");break;default:return}window.wp.a11y.speak(t,"assertive")},init:function(){var t=r("div.ajaxtag");r(".tagsdiv").each(function(){tagBox.quickClicks(this)}),r(".tagadd",t).click(function(){tagBox.userAction="add",tagBox.flushTags(r(this).closest(".tagsdiv"))}),r("input.newtag",t).keypress(function(t){13==t.which&&(tagBox.userAction="add",tagBox.flushTags(r(this).closest(".tagsdiv")),t.preventDefault(),t.stopPropagation())}).each(function(t,e){r(e).wpTagsSuggest()}),r("#post").submit(function(){r("div.tagsdiv").each(function(){tagBox.flushTags(this,!1,1)})}),r(".tagcloud-link").click(function(){tagBox.get(r(this).attr("id")),r(this).attr("aria-expanded","true").unbind().click(function(){r(this).attr("aria-expanded","false"===r(this).attr("aria-expanded")?"true":"false").siblings(".the-tagcloud").toggle()})})}}}(jQuery);