!function(z){(!z.ui.FloatPanel.zIndex||z.ui.FloatPanel.zIndex<100100)&&(z.ui.FloatPanel.zIndex=100100),z.PluginManager.add("wordpress",function(g){var r,t,W=z.DOM,h=z.each,f=g.editorManager.i18n.translate,i=window.jQuery,o=window.wp,a=o&&o.editor&&o.editor.autop&&g.getParam("wpautop",!0),s=!1;function e(n){var e,t,o,i=0,a=z.$(".block-library-classic__toolbar");"hide"===n?e=!0:a.length&&!a.hasClass("has-advanced-toolbar")&&(a.addClass("has-advanced-toolbar"),n="show"),g.theme.panel&&(t=g.theme.panel.find(".toolbar:not(.menubar)")),t&&1<t.length&&(!n&&t[1].visible()&&(n="hide"),h(t,function(e,t){0<t&&("hide"===n?(e.hide(),i+=34):(e.show(),i-=34))})),i&&!z.Env.iOS&&g.iframeElement&&g.iframeElement.clientHeight&&50<(o=g.iframeElement.clientHeight+i)&&W.setStyle(g.iframeElement,"height",o),e||("hide"===n?(setUserSetting("hidetb","0"),r&&r.active(!1)):(setUserSetting("hidetb","1"),r&&r.active(!0))),g.fire("wp-toolbar-toggle")}function d(e){var t,n=g.translate(e);return s||function(){var o="Shift+Alt+",i="Ctrl+";s={},z.Env.mac&&(o="\u2303\u2325",i="\u2318"),g.settings.wp_shortcut_labels&&h(g.settings.wp_shortcut_labels,function(e,t){var n=g.translate(t);e=e.replace("access",o).replace("meta",i),s[t]=e,t!==n&&(s[n]=e)})}(),s.hasOwnProperty(n)?t=s[n]:s.hasOwnProperty(e)&&(t=s[e]),t?n+" ("+t+")":n}function n(){}return i&&i(document).triggerHandler("tinymce-editor-setup",[g]),g.addButton("wp_adv",{tooltip:"Toolbar Toggle",cmd:"WP_Adv",onPostRender:function(){(r=this).active("1"===getUserSetting("hidetb"))}}),g.on("PostRender",function(){g.getParam("wordpress_adv_hidden",!0)&&"0"===getUserSetting("hidetb","0")?e("hide"):z.$(".block-library-classic__toolbar").addClass("has-advanced-toolbar")}),g.addCommand("WP_Adv",function(){e()}),g.on("focus",function(){window.wpActiveEditor=g.id}),g.on("BeforeSetContent",function(e){var n;e.content&&(-1!==e.content.indexOf("\x3c!--more")&&(n=f("Read more..."),e.content=e.content.replace(/<!--more(.*?)-->/g,function(e,t){return'<img src="'+z.Env.transparentSrc+'" data-wp-more="more" data-wp-more-text="'+t+'" class="wp-more-tag mce-wp-more" alt="" title="'+n+'" data-mce-resize="false" data-mce-placeholder="1" />'})),-1!==e.content.indexOf("\x3c!--nextpage--\x3e")&&(n=f("Page break"),e.content=e.content.replace(/<!--nextpage-->/g,'<img src="'+z.Env.transparentSrc+'" data-wp-more="nextpage" class="wp-more-tag mce-wp-nextpage" alt="" title="'+n+'" data-mce-resize="false" data-mce-placeholder="1" />')),e.load&&"raw"!==e.format&&(e.content=a?o.editor.autop(e.content):e.content.replace(/-->\s+<!--/g,"--\x3e\x3c!--")),-1===e.content.indexOf("<script")&&-1===e.content.indexOf("<style")||(e.content=e.content.replace(/<(script|style)[^>]*>[\s\S]*?<\/\1>/g,function(e,t){return'<img src="'+z.Env.transparentSrc+'" data-wp-preserve="'+encodeURIComponent(e)+'" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="&lt;'+t+'&gt;" title="&lt;'+t+'&gt;" />'})))}),g.on("setcontent",function(){g.$("p").each(function(e,t){if(t.innerHTML&&t.innerHTML.length<10){var n=z.trim(t.innerHTML);n&&"&nbsp;"!==n||(t.innerHTML=z.Env.ie&&z.Env.ie<11?"":'<br data-mce-bogus="1">')}})}),g.on("PostProcess",function(e){e.get&&(e.content=e.content.replace(/<img[^>]+>/g,function(e){var t,n,o="";return-1!==e.indexOf('data-wp-more="more"')?((t=e.match(/data-wp-more-text="([^"]+)"/))&&(o=t[1]),n="\x3c!--more"+o+"--\x3e"):-1!==e.indexOf('data-wp-more="nextpage"')?n="\x3c!--nextpage--\x3e":-1!==e.indexOf("data-wp-preserve")&&(t=e.match(/ data-wp-preserve="([^"]+)"/))&&(n=decodeURIComponent(t[1])),n||e}))}),g.on("ResolveName",function(e){var t;"IMG"===e.target.nodeName&&(t=g.dom.getAttrib(e.target,"data-wp-more"))&&(e.name=t)}),g.addCommand("WP_More",function(e){var t,n,o,i="wp-more-tag",a=g.dom,r=g.selection.getNode(),s=g.getBody();i+=" mce-wp-"+(e=e||"more"),o=f(o="more"===e?"Read more...":"Next page"),n='<img src="'+z.Env.transparentSrc+'" alt="" title="'+o+'" class="'+i+'" data-wp-more="'+e+'" data-mce-resize="false" data-mce-placeholder="1" />',r===s||"P"===r.nodeName&&r.parentNode===s?g.insertContent(n):(t=a.getParent(r,function(e){return!(!e.parentNode||e.parentNode!==s)},g.getBody()))&&("P"===t.nodeName?t.appendChild(a.create("p",null,n).firstChild):a.insertAfter(a.create("p",null,n),t),g.nodeChanged())}),g.addCommand("WP_Code",function(){g.formatter.toggle("code")}),g.addCommand("WP_Page",function(){g.execCommand("WP_More","nextpage")}),g.addCommand("WP_Help",function(){var e,t,n,o,i=z.Env.mac?f("Ctrl + Alt + letter:"):f("Shift + Alt + letter:"),a=z.Env.mac?f("Cmd + letter:"):f("Ctrl + letter:"),r=[],s=[],d={},l={},c=0,p=0,m=g.settings.wp_shortcut_labels;function u(e,t){var n="<tr>",o=0;for(t=t||1,h(e,function(e,t){n+="<td><kbd>"+t+"</kbd></td><td>"+f(e)+"</td>",o++});o<t;)n+="<td></td><td></td>",o++;return n+"</tr>"}m&&(h(m,function(e,t){var n;-1!==e.indexOf("meta")?(c++,(n=e.replace("meta","").toLowerCase())&&(d[n]=t,c%2==0&&(r.push(u(d,2)),d={}))):-1!==e.indexOf("access")&&(p++,(n=e.replace("access","").toLowerCase())&&(l[n]=t,p%2==0&&(s.push(u(l,2)),l={})))}),0<c%2&&r.push(u(d,2)),0<p%2&&s.push(u(l,2)),e="<tr><th>"+(e=[f("Letter"),f("Action"),f("Letter"),f("Action")]).join("</th><th>")+"</th></tr>",t=(t='<div class="wp-editor-help">')+"<h2>"+f("Default shortcuts,")+" "+a+'</h2><table class="wp-help-th-center fixed">'+e+r.join("")+"</table><h2>"+f("Additional shortcuts,")+" "+i+'</h2><table class="wp-help-th-center fixed">'+e+s.join("")+"</table>",g.plugins.wptextpattern&&(!z.Env.ie||8<z.Env.ie)&&(t=(t=t+"<h2>"+f("When starting a new paragraph with one of these formatting shortcuts followed by a space, the formatting will be applied automatically. Press Backspace or Escape to undo.")+'</h2><table class="wp-help-th-center fixed">'+u({"*":"Bullet list","1.":"Numbered list"})+u({"-":"Bullet list","1)":"Numbered list"})+"</table>")+"<h2>"+f("The following formatting shortcuts are replaced when pressing Enter. Press Escape or the Undo button to undo.")+'</h2><table class="wp-help-single">'+u({">":"Blockquote"})+u({"##":"Heading 2"})+u({"###":"Heading 3"})+u({"####":"Heading 4"})+u({"#####":"Heading 5"})+u({"######":"Heading 6"})+u({"---":"Horizontal line"})+"</table>"),t=t+"<h2>"+f("Focus shortcuts:")+'</h2><table class="wp-help-single">'+u({"Alt + F8":"Inline toolbar (when an image, link or preview is selected)"})+u({"Alt + F9":"Editor menu (when enabled)"})+u({"Alt + F10":"Editor toolbar"})+u({"Alt + F11":"Elements path"})+"</table><p>"+f("To move focus to other buttons use Tab or the arrow keys. To return focus to the editor press Escape or use one of the buttons.")+"</p>",t+="</div>",(n=g.windowManager.open({title:g.settings.classic_block_editor?"Classic Block Keyboard Shortcuts":"Keyboard Shortcuts",items:{type:"container",classes:"wp-help",html:t},buttons:{text:"Close",onclick:"close"}})).$el&&(n.$el.find('div[role="application"]').attr("role","document"),(o=n.$el.find(".mce-wp-help"))[0]&&(o.attr("tabindex","0"),o[0].focus(),o.on("keydown",function(e){33<=e.keyCode&&e.keyCode<=40&&e.stopPropagation()}))))}),g.addCommand("WP_Medialib",function(){o&&o.media&&o.media.editor&&o.media.editor.open(g.id)}),g.addButton("wp_more",{tooltip:"Insert Read More tag",onclick:function(){g.execCommand("WP_More","more")}}),g.addButton("wp_page",{tooltip:"Page break",onclick:function(){g.execCommand("WP_More","nextpage")}}),g.addButton("wp_help",{tooltip:"Keyboard Shortcuts",cmd:"WP_Help"}),g.addButton("wp_code",{tooltip:"Code",cmd:"WP_Code",stateSelector:"code"}),o&&o.media&&o.media.editor&&(g.addButton("wp_add_media",{tooltip:"Add Media",icon:"dashicon dashicons-admin-media",cmd:"WP_Medialib"}),g.addMenuItem("add_media",{text:"Add Media",icon:"wp-media-library",context:"insert",cmd:"WP_Medialib"})),g.addMenuItem("wp_more",{text:"Insert Read More tag",icon:"wp_more",context:"insert",onclick:function(){g.execCommand("WP_More","more")}}),g.addMenuItem("wp_page",{text:"Page break",icon:"wp_page",context:"insert",onclick:function(){g.execCommand("WP_More","nextpage")}}),g.on("BeforeExecCommand",function(e){!z.Env.webkit||"InsertUnorderedList"!==e.command&&"InsertOrderedList"!==e.command||(t=t||g.dom.create("style",{type:"text/css"},"#tinymce,#tinymce span,#tinymce li,#tinymce li>span,#tinymce p,#tinymce p>span{font:medium sans-serif;color:#000;line-height:normal;}"),g.getDoc().head.appendChild(t))}),g.on("ExecCommand",function(e){z.Env.webkit&&t&&("InsertUnorderedList"===e.command||"InsertOrderedList"===e.command)&&g.dom.remove(t)}),g.on("init",function(){var e=z.Env,t=["mceContentBody"],n=g.getDoc(),o=g.dom;e.iOS&&o.addClass(n.documentElement,"ios"),"rtl"===g.getParam("directionality")&&(t.push("rtl"),o.setAttrib(n.documentElement,"dir","rtl")),o.setAttrib(n.documentElement,"lang",g.getParam("wp_lang_attr")),e.ie?9===parseInt(e.ie,10)?t.push("ie9"):8===parseInt(e.ie,10)?t.push("ie8"):e.ie<8&&t.push("ie7"):e.webkit&&t.push("webkit"),t.push("wp-editor"),h(t,function(e){e&&o.addClass(n.body,e)}),g.on("BeforeSetContent",function(e){e.content&&(e.content=e.content.replace(/<p>\s*<(p|div|ul|ol|dl|table|blockquote|h[1-6]|fieldset|pre)( [^>]*)?>/gi,"<$1$2>").replace(/<\/(p|div|ul|ol|dl|table|blockquote|h[1-6]|fieldset|pre)>\s*<\/p>/gi,"</$1>"))}),i&&i(document).triggerHandler("tinymce-editor-init",[g]),window.tinyMCEPreInit&&window.tinyMCEPreInit.dragDropUpload&&o.bind(n,"dragstart dragend dragover drop",function(e){i&&i(document).trigger(new i.Event(e))}),g.getParam("wp_paste_filters",!0)&&(g.on("PastePreProcess",function(e){e.content=e.content.replace(/<br class="?Apple-interchange-newline"?>/gi,""),z.Env.webkit||(e.content=e.content.replace(/(<[^>]+) style="[^"]*"([^>]*>)/gi,"$1$2"),e.content=e.content.replace(/(<[^>]+) data-mce-style=([^>]+>)/gi,"$1 style=$2"))}),g.on("PastePostProcess",function(e){g.$("p",e.node).each(function(e,t){o.isEmpty(t)&&o.remove(t)}),z.isIE&&g.$("a",e.node).find("font, u").each(function(e,t){o.remove(t,!0)})}))}),g.on("SaveContent",function(e){g.inline||!g.isHidden()?(e.content=e.content.replace(/<p>(?:<br ?\/?>|\u00a0|\uFEFF| )*<\/p>/g,"<p>&nbsp;</p>"),e.content=a?o.editor.removep(e.content):e.content.replace(/-->\s*<!-- wp:/g,"--\x3e\n\n\x3c!-- wp:")):e.content=e.element.value}),g.on("preInit",function(){g.schema.addValidElements("@[id|accesskey|class|dir|lang|style|tabindex|title|contenteditable|draggable|dropzone|hidden|spellcheck|translate],i,b,script[src|async|defer|type|charset|crossorigin|integrity]"),z.Env.iOS&&(g.settings.height=300),h({c:"JustifyCenter",r:"JustifyRight",l:"JustifyLeft",j:"JustifyFull",q:"mceBlockQuote",u:"InsertUnorderedList",o:"InsertOrderedList",m:"WP_Medialib",t:"WP_More",d:"Strikethrough",p:"WP_Page",x:"WP_Code"},function(e,t){g.shortcuts.add("access+"+t,"",e)}),g.addShortcut("meta+s","",function(){o&&o.autosave&&o.autosave.server.triggerSave()}),g.settings.classic_block_editor||g.addShortcut("access+z","","WP_Adv"),g.on("keydown",function(e){return!(z.Env.mac?e.ctrlKey&&e.altKey&&"KeyH"===e.code:e.shiftKey&&e.altKey&&"KeyH"===e.code)||(g.execCommand("WP_Help"),e.stopPropagation(),e.stopImmediatePropagation(),!1)}),1<window.getUserSetting("editor_plain_text_paste_warning")&&(g.settings.paste_plaintext_inform=!1),z.Env.mac&&z.$(g.iframeElement).attr("title",f("Rich Text Area. Press Control-Option-H for help."))}),g.on("PastePlainTextToggle",function(e){if(!0===e.state){var t=parseInt(window.getUserSetting("editor_plain_text_paste_warning"),10)||0;t<2&&window.setUserSetting("editor_plain_text_paste_warning",++t)}}),g.on("beforerenderui",function(){g.theme.panel&&(h(["button","colorbutton","splitbutton"],function(e){!function(e){if(!e)return;h(e,function(e){var t;e&&e.settings.tooltip&&(t=d(e.settings.tooltip),e.settings.tooltip=t,e._aria&&e._aria.label&&(e._aria.label=t))})}(g.theme.panel.find(e))}),h(g.theme.panel.find("listbox"),function(e){e&&"Paragraph"===e.settings.text&&h(e.settings.values,function(e){e.text&&s.hasOwnProperty(e.text)&&(e.shortcut="("+s[e.text]+")")})}))}),g.on("preinit",function(){var o,E,i,k,S,M,a,r=z.ui.Factory,s=g.settings,e=g.getContainer(),I=document.getElementById("wpadminbar"),B=document.getElementById(g.id+"_ifr");function t(e){var t,n;if(o)if(o.tempHide||"hide"===e.type||"blur"===e.type)o.hide(),o=!1;else if(("resizewindow"===e.type||"scrollwindow"===e.type||"resize"===e.type||"scroll"===e.type)&&!o.blockHide){if("resize"===e.type||"resizewindow"===e.type){if(n=(t=g.getWin()).innerHeight+t.innerWidth,a&&2e3<(new Date).getTime()-a.timestamp&&(a=null),!a)return void(a={timestamp:(new Date).getTime(),size:n});if(n&&Math.abs(n-a.size)<2)return}clearTimeout(i),i=setTimeout(function(){o&&"function"==typeof o.show&&(o.scrolling=!1,o.show())},250),o.scrolling=!0,o.hide()}}e&&(k=z.$(".mce-toolbar-grp",e)[0],S=z.$(".mce-statusbar",e)[0]),"content"===g.id&&(M=document.getElementById("post-status-info")),g.shortcuts.add("alt+119","",function(){var e;o&&(e=o.find("toolbar")[0])&&e.focus(!0)}),g.on("nodechange",function(e){var t=g.selection.isCollapsed(),n={element:e.element,parents:e.parents,collapsed:t};g.fire("wptoolbar",n),E=n.selection||n.element,o&&o!==n.toolbar&&o.hide(),n.toolbar?(o=n.toolbar).visible()?o.reposition():o.show():o=!1}),g.on("focus",function(){o&&o.show()}),g.inline?(g.on("resizewindow",t),document.addEventListener("scroll",t,!0)):(g.dom.bind(g.getWin(),"resize scroll",t),g.on("resizewindow scrollwindow",t)),g.on("remove",function(){document.removeEventListener("scroll",t,!0),g.off("resizewindow scrollwindow",t),g.dom.unbind(g.getWin(),"resize scroll",t)}),g.on("blur hide",t),g.wp=g.wp||{},g.wp._createToolbar=function(e,t){var n,o,a=[];return h(e,function(i){var t,e;function n(){var e=g.selection;"bullist"===t&&e.selectorChanged("ul > li",function(e,t){for(var n,o=t.parents.length;o--&&"OL"!==(n=t.parents[o].nodeName)&&"UL"!=n;);i.active(e&&"UL"===n)}),"numlist"===t&&e.selectorChanged("ol > li",function(e,t){for(var n,o=t.parents.length;o--&&"OL"!==(n=t.parents[o].nodeName)&&"UL"!==n;);i.active(e&&"OL"===n)}),i.settings.stateSelector&&e.selectorChanged(i.settings.stateSelector,function(e){i.active(e)},!0),i.settings.disabledStateSelector&&e.selectorChanged(i.settings.disabledStateSelector,function(e){i.disabled(e)})}"|"===i?o=null:r.has(i)?(i={type:i},s.toolbar_items_size&&(i.size=s.toolbar_items_size),a.push(i),o=null):(o||(o={type:"buttongroup",items:[]},a.push(o)),g.buttons[i]&&(t=i,"function"==typeof(i=g.buttons[t])&&(i=i()),i.type=i.type||"button",s.toolbar_items_size&&(i.size=s.toolbar_items_size),(e=i.tooltip||i.title)&&(i.tooltip=d(e)),i=r.create(i),o.items.push(i),g.initialized?n():g.on("init",n)))}),(n=r.create({type:"panel",layout:"stack",classes:"toolbar-grp inline-toolbar-grp",ariaRoot:!0,ariaRemember:!0,items:[{type:"toolbar",layout:"flow",items:a}]})).bottom=t,n.on("show",function(){this.reposition()}),n.on("keydown",function(e){27===e.keyCode&&(this.hide(),g.focus())}),g.on("remove",function(){n.remove()}),n.reposition=function(){if(!E)return this;var e,t,n=window.pageXOffset||document.documentElement.scrollLeft,o=window.pageYOffset||document.documentElement.scrollTop,i=window.innerWidth,a=window.innerHeight,r=B?B.getBoundingClientRect():{top:0,right:i,bottom:a,left:0,width:i,height:a},s=this.getEl(),d=s.offsetWidth,l=s.clientHeight,c=E.getBoundingClientRect(),p=(c.left+c.right)/2,m=l+5,u=I?I.getBoundingClientRect().bottom:0,g=k?k.getBoundingClientRect().bottom:0,h=S?a-S.getBoundingClientRect().top:0,f=M?a-M.getBoundingClientRect().top:0,w=Math.max(0,u,g,r.top),b=Math.max(0,h,f,a-r.bottom),v=c.top+r.top-w,_=a-r.top-c.bottom-b,y=a-w-b,x="",P=0,C=0;return y<=v||y<=_?(this.scrolling=!0,this.hide(),this.scrolling=!1):(z.Env.iOS&&"IMG"===E.nodeName&&(P=54,C=46),this.bottom?m<=_?(x=" mce-arrow-up",e=c.bottom+r.top+o-C):m<=v&&(x=" mce-arrow-down",e=c.top+r.top+o-l+P):m<=v?(x=" mce-arrow-down",e=c.top+r.top+o-l+P):m<=_&&y/2>c.bottom+r.top-w&&(x=" mce-arrow-up",e=c.bottom+r.top+o-C),void 0===e&&(e=o+w+5+C),t=p-d/2+r.left+n,c.left<0||c.right>r.width?t=r.left+n+(r.width-d)/2:i<=d?(x+=" mce-arrow-full",t=0):t<0&&c.left+d>i||i<t+d&&c.right-d<0?t=(i-d)/2:t<r.left+n?(x+=" mce-arrow-left",t=c.left+r.left+n):t+d>r.width+r.left+n&&(x+=" mce-arrow-right",t=c.right-d+r.left+n),z.Env.iOS&&"IMG"===E.nodeName&&(x=x.replace(/ ?mce-arrow-(up|down)/g,"")),s.className=s.className.replace(/ ?mce-arrow-[\w]+/g,"")+x,W.setStyles(s,{left:t,top:e})),this},n.hide().renderTo(document.body),n}},!0),{_showButtons:n,_hideButtons:n,_setEmbed:n,_getEmbed:n}})}(window.tinymce);