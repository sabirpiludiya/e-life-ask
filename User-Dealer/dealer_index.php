<?php

error_reporting(0);
	
session_start();


	if(!($_SESSION['dealer_email']))
	{
		?>
		<script>
		window.location.href="login.php";
		</script>
		<?php
	}


		
	if(!($_SESSION['dealer_status']))
	{
		?>
		<script>
		window.location.href="user_blocked.php";
		</script>
		<?php
	}
		

	include "connection.php";
	
	$select = mysql_query("Select * from Tbl_dealer where dealer_email=$_SESSION[dealer_email]");
	$row = mysql_fetch_array($select);
	
?>

<!doctype html>
<html class="no-js" lang="en">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0" />
    <title>Welcome to E-LifeAsk</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="autdor" content="">
	<link rel="shortcut icon" href="favicon.ico">
    
	<!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<!-- Awesome Fonts -->
	<link rel="stylesheet" href="css/font-awesome.css">
	<!-- Bootstrap -->
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<!-- Template Styles -->
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/colors.css">    
	<!-- Layer Slider -->
	<link rel="stylesheet" href="layerslider/css/layerslider.css" type="text/css">
    
	
	
	<style type="text/css">
	
	.b_line
	{
	border-bottom:solid 10px #000000;
	}
	td
	{
	border-bottom:solid 1px;
	}
	</style>
	


	<script type="text/javascript">
	(function(f,g,c,j,d,k,l){/*! Jssor */
	new(function(){});var e={Fd:function(a){return-c.cos(a*c.PI)/2+.5},Hd:function(a){return a},Id:function(a){return-a*(a-2)}};var b=new function(){var h=this,Ab=/\S+/g,F=1,yb=2,fb=3,eb=4,jb=5,G,r=0,i=0,s=0,X=0,z=0,I=navigator,ob=I.appName,o=I.userAgent,p=parseFloat;function Ib(){if(!G){G={Ae:"ontouchstart"in f||"createTouch"in g};var a;if(I.pointerEnabled||(a=I.msPointerEnabled))G.jd=a?"msTouchAction":"touchAction"}return G}function v(j){if(!r){r=-1;if(ob=="Microsoft Internet Explorer"&&!!f.attachEvent&&!!f.ActiveXObject){var e=o.indexOf("MSIE");r=F;s=p(o.substring(e+5,o.indexOf(";",e)));/*@cc_on X=@_jscript_version@*/;i=g.documentMode||s}else if(ob=="Netscape"&&!!f.addEventListener){var d=o.indexOf("Firefox"),b=o.indexOf("Safari"),h=o.indexOf("Chrome"),c=o.indexOf("AppleWebKit");if(d>=0){r=yb;i=p(o.substring(d+8))}else if(b>=0){var k=o.substring(0,b).lastIndexOf("/");r=h>=0?eb:fb;i=p(o.substring(k+1,b))}else{var a=/Trident\/.*rv:([0-9]{1,}[\.0-9]{0,})/i.exec(o);if(a){r=F;i=s=p(a[1])}}if(c>=0)z=p(o.substring(c+12))}else{var a=/(opera)(?:.*version|)[ \/]([\w.]+)/i.exec(o);if(a){r=jb;i=p(a[2])}}}return j==r}function q(){return v(F)}function Q(){return q()&&(i<6||g.compatMode=="BackCompat")}function db(){return v(fb)}function ib(){return v(jb)}function vb(){return db()&&z>534&&z<535}function J(){v();return z>537||i>42||r==F&&i>=11}function O(){return q()&&i<9}function wb(a){var b,c;return function(f){if(!b){b=d;var e=a.substr(0,1).toUpperCase()+a.substr(1);n([a].concat(["WebKit","ms","Moz","O","webkit"]),function(g,d){var b=a;if(d)b=g+e;if(f.style[b]!=l)return c=b})}return c}}function ub(b){var a;return function(c){a=a||wb(b)(c)||b;return a}}var K=ub("transform");function nb(a){return{}.toString.call(a)}var kb={};n(["Boolean","Number","String","Function","Array","Date","RegExp","Object"],function(a){kb["[object "+a+"]"]=a.toLowerCase()});function n(b,d){var a,c;if(nb(b)=="[object Array]"){for(a=0;a<b.length;a++)if(c=d(b[a],a,b))return c}else for(a in b)if(c=d(b[a],a,b))return c}function C(a){return a==j?String(a):kb[nb(a)]||"object"}function lb(a){for(var b in a)return d}function A(a){try{return C(a)=="object"&&!a.nodeType&&a!=a.window&&(!a.constructor||{}.hasOwnProperty.call(a.constructor.prototype,"isPrototypeOf"))}catch(b){}}function u(a,b){return{x:a,y:b}}function rb(b,a){setTimeout(b,a||0)}function H(b,d,c){var a=!b||b=="inherit"?"":b;n(d,function(c){var b=c.exec(a);if(b){var d=a.substr(0,b.index),e=a.substr(b.index+b[0].length+1,a.length-1);a=d+e}});a=c+(!a.indexOf(" ")?"":" ")+a;return a}function tb(b,a){if(i<9)b.style.filter=a}h.Oe=Ib;h.fd=q;h.Re=db;h.qd=J;h.Kc=O;wb("transform");h.tc=function(){return i};h.rc=rb;function Y(a){a.constructor===Y.caller&&a.pc&&a.pc.apply(a,Y.caller.arguments)}h.pc=Y;h.ib=function(a){if(h.ze(a))a=g.getElementById(a);return a};function t(a){return a||f.event}h.vc=t;h.Vb=function(b){b=t(b);var a=b.target||b.srcElement||g;if(a.nodeType==3)a=h.lc(a);return a};h.oc=function(a){a=t(a);return{x:a.pageX||a.clientX||0,y:a.pageY||a.clientY||0}};function D(c,d,a){if(a!==l)c.style[d]=a==l?"":a;else{var b=c.currentStyle||c.style;a=b[d];if(a==""&&f.getComputedStyle){b=c.ownerDocument.defaultView.getComputedStyle(c,j);b&&(a=b.getPropertyValue(d)||b[d])}return a}}function ab(b,c,a,d){if(a!==l){if(a==j)a="";else d&&(a+="px");D(b,c,a)}else return p(D(b,c))}function m(c,a){var d=a?ab:D,b;if(a&4)b=ub(c);return function(e,f){return d(e,b?b(e):c,f,a&2)}}function Db(b){if(q()&&s<9){var a=/opacity=([^)]*)/.exec(b.style.filter||"");return a?p(a[1])/100:1}else return p(b.style.opacity||"1")}function Fb(b,a,f){if(q()&&s<9){var h=b.style.filter||"",i=new RegExp(/[\s]*alpha\([^\)]*\)/g),e=c.round(100*a),d="";if(e<100||f)d="alpha(opacity="+e+") ";var g=H(h,[i],d);tb(b,g)}else b.style.opacity=a==1?"":c.round(a*100)/100}var L={ab:["rotate"],J:["rotateX"],K:["rotateY"],ub:["skewX"],vb:["skewY"]};if(!J())L=B(L,{o:["scaleX",2],n:["scaleY",2],L:["translateZ",1]});function M(d,a){var c="";if(a){if(q()&&i&&i<10){delete a.J;delete a.K;delete a.L}b.e(a,function(d,b){var a=L[b];if(a){var e=a[1]||0;if(N[b]!=d)c+=" "+a[0]+"("+d+(["deg","px",""])[e]+")"}});if(J()){if(a.S||a.X||a.L)c+=" translate3d("+(a.S||0)+"px,"+(a.X||0)+"px,"+(a.L||0)+"px)";if(a.o==l)a.o=1;if(a.n==l)a.n=1;if(a.o!=1||a.n!=1)c+=" scale3d("+a.o+", "+a.n+", 1)"}}d.style[K(d)]=c}h.Lc=m("transformOrigin",4);h.He=m("backfaceVisibility",4);h.he=m("transformStyle",4);h.Ce=m("perspective",6);h.Ee=m("perspectiveOrigin",4);h.Fe=function(a,b){if(q()&&s<9||s<10&&Q())a.style.zoom=b==1?"":b;else{var c=K(a),f="scale("+b+")",e=a.style[c],g=new RegExp(/[\s]*scale\(.*?\)/g),d=H(e,[g],f);a.style[c]=d}};h.Zb=function(b,a){return function(c){c=t(c);var e=c.type,d=c.relatedTarget||(e=="mouseout"?c.toElement:c.fromElement);(!d||d!==a&&!h.pe(a,d))&&b(c)}};h.a=function(a,d,b,c){a=h.ib(a);if(a.addEventListener){d=="mousewheel"&&a.addEventListener("DOMMouseScroll",b,c);a.addEventListener(d,b,c)}else if(a.attachEvent){a.attachEvent("on"+d,b);c&&a.setCapture&&a.setCapture()}};h.A=function(a,c,d,b){a=h.ib(a);if(a.removeEventListener){c=="mousewheel"&&a.removeEventListener("DOMMouseScroll",d,b);a.removeEventListener(c,d,b)}else if(a.detachEvent){a.detachEvent("on"+c,d);b&&a.releaseCapture&&a.releaseCapture()}};h.yb=function(a){a=t(a);a.preventDefault&&a.preventDefault();a.cancel=d;a.returnValue=k};h.xe=function(a){a=t(a);a.stopPropagation&&a.stopPropagation();a.cancelBubble=d};h.D=function(d,c){var a=[].slice.call(arguments,2),b=function(){var b=a.concat([].slice.call(arguments,0));return c.apply(d,b)};return b};h.ue=function(a,b){if(b==l)return a.textContent||a.innerText;var c=g.createTextNode(b);h.Yb(a);a.appendChild(c)};h.zb=function(d,c){for(var b=[],a=d.firstChild;a;a=a.nextSibling)(c||a.nodeType==1)&&b.push(a);return b};function mb(a,c,e,b){b=b||"u";for(a=a?a.firstChild:j;a;a=a.nextSibling)if(a.nodeType==1){if(U(a,b)==c)return a;if(!e){var d=mb(a,c,e,b);if(d)return d}}}h.v=mb;function S(a,d,f,b){b=b||"u";var c=[];for(a=a?a.firstChild:j;a;a=a.nextSibling)if(a.nodeType==1){U(a,b)==d&&c.push(a);if(!f){var e=S(a,d,f,b);if(e.length)c=c.concat(e)}}return c}function gb(a,c,d){for(a=a?a.firstChild:j;a;a=a.nextSibling)if(a.nodeType==1){if(a.tagName==c)return a;if(!d){var b=gb(a,c,d);if(b)return b}}}h.ye=gb;h.Je=function(b,a){return b.getElementsByTagName(a)};function B(){var e=arguments,d,c,b,a,g=1&e[0],f=1+g;d=e[f-1]||{};for(;f<e.length;f++)if(c=e[f])for(b in c){a=c[b];if(a!==l){a=c[b];var h=d[b];d[b]=g&&(A(h)||A(a))?B(g,{},h,a):a}}return d}h.V=B;function Z(f,g){var d={},c,a,b;for(c in f){a=f[c];b=g[c];if(a!==b){var e;if(A(a)&&A(b)){a=Z(a,b);e=!lb(a)}!e&&(d[c]=a)}}return d}h.Hc=function(a){return C(a)=="function"};h.ze=function(a){return C(a)=="string"};h.Ne=function(a){return!isNaN(p(a))&&isFinite(a)};h.e=n;function R(a){return g.createElement(a)}h.Eb=function(){return R("DIV")};h.Ge=function(){return R("SPAN")};h.Gc=function(){};function V(b,c,a){if(a==l)return b.getAttribute(c);b.setAttribute(c,a)}function U(a,b){return V(a,b)||V(a,"data-"+b)}h.m=V;h.g=U;function x(b,a){if(a==l)return b.className;b.className=a}h.Dc=x;function qb(b){var a={};n(b,function(b){a[b]=b});return a}function sb(b,a){return b.match(a||Ab)}function P(b,a){return qb(sb(b||"",a))}h.fe=sb;function bb(b,c){var a="";n(c,function(c){a&&(a+=b);a+=c});return a}function E(a,c,b){x(a,bb(" ",B(Z(P(x(a)),P(c)),P(b))))}h.lc=function(a){return a.parentNode};h.Q=function(a){h.M(a,"none")};h.N=function(a,b){h.M(a,b?"none":"")};h.xd=function(b,a){b.removeAttribute(a)};h.vd=function(){return q()&&i<10};h.ud=function(d,a){if(a)d.style.clip="rect("+c.round(a.k||a.q||0)+"px "+c.round(a.s)+"px "+c.round(a.u)+"px "+c.round(a.j||a.p||0)+"px)";else if(a!==l){var g=d.style.cssText,f=[new RegExp(/[\s]*clip: rect\(.*?\)[;]?/i),new RegExp(/[\s]*cliptop: .*?[;]?/i),new RegExp(/[\s]*clipright: .*?[;]?/i),new RegExp(/[\s]*clipbottom: .*?[;]?/i),new RegExp(/[\s]*clipleft: .*?[;]?/i)],e=H(g,f,"");b.Cb(d,e)}};h.I=function(){return+new Date};h.H=function(b,a){b.appendChild(a)};h.Fb=function(b,a,c){(c||a.parentNode).insertBefore(b,a)};h.Gb=function(b,a){a=a||b.parentNode;a&&a.removeChild(b)};h.ld=function(a,b){n(a,function(a){h.Gb(a,b)})};h.Yb=function(a){h.ld(h.zb(a,d),a)};h.md=function(a,b){var c=h.lc(a);b&1&&h.C(a,(h.i(c)-h.i(a))/2);b&2&&h.B(a,(h.l(c)-h.l(a))/2)};h.rd=function(b,a){return parseInt(b,a||10)};h.Bd=p;h.pe=function(b,a){var c=g.body;while(a&&b!==a&&c!==a)try{a=a.parentNode}catch(d){return k}return b===a};function W(d,c,b){var a=d.cloneNode(!c);!b&&h.xd(a,"id");return a}h.fb=W;h.gb=function(e,f){var a=new Image;function b(e,d){h.A(a,"load",b);h.A(a,"abort",c);h.A(a,"error",c);f&&f(a,d)}function c(a){b(a,d)}if(ib()&&i<11.6||!e)b(!e);else{h.a(a,"load",b);h.a(a,"abort",c);h.a(a,"error",c);a.src=e}};h.Rd=function(d,a,e){var c=d.length+1;function b(b){c--;if(a&&b&&b.src==a.src)a=b;!c&&e&&e(a)}n(d,function(a){h.gb(a.src,b)});b()};h.Dd=function(a,g,i,h){if(h)a=W(a);var c=S(a,g);if(!c.length)c=b.Je(a,g);for(var f=c.length-1;f>-1;f--){var d=c[f],e=W(i);x(e,x(d));b.Cb(e,d.style.cssText);b.Fb(e,d);b.Gb(d)}return a};function Gb(a){var k=this,p="",r=["av","pv","ds","dn"],e=[],q,j=0,f=0,d=0;function i(){E(a,q,e[d||j||f&2||f]);b.E(a,"pointer-events",d?"none":"")}function c(){j=0;i();h.A(g,"mouseup",c);h.A(g,"touchend",c);h.A(g,"touchcancel",c)}function o(a){if(d)h.yb(a);else{j=4;i();h.a(g,"mouseup",c);h.a(g,"touchend",c);h.a(g,"touchcancel",c)}}k.de=function(a){if(a===l)return f;f=a&2||a&1;i()};k.wc=function(a){if(a===l)return!d;d=a?0:3;i()};k.T=a=h.ib(a);var m=b.fe(x(a));if(m)p=m.shift();n(r,function(a){e.push(p+a)});q=bb(" ",e);e.unshift("");h.a(a,"mousedown",o);h.a(a,"touchstart",o)}h.Sb=function(a){return new Gb(a)};h.E=D;h.tb=m("overflow");h.B=m("top",2);h.C=m("left",2);h.i=m("width",2);h.l=m("height",2);h.ce=m("marginLeft",2);h.be=m("marginTop",2);h.r=m("position");h.M=m("display");h.z=m("zIndex",1);h.cc=function(b,a,c){if(a!=l)Fb(b,a,c);else return Db(b)};h.Cb=function(a,b){if(b!=l)a.style.cssText=b;else return a.style.cssText};var T={kb:h.cc,k:h.B,j:h.C,Db:h.i,rb:h.l,pb:h.r,af:h.M,ob:h.z};function w(f,k){var e=O(),b=J(),d=vb(),g=K(f);function i(b,d,a){var e=b.U(u(-d/2,-a/2)),f=b.U(u(d/2,-a/2)),g=b.U(u(d/2,a/2)),h=b.U(u(-d/2,a/2));b.U(u(300,300));return u(c.min(e.x,f.x,g.x,h.x)+d/2,c.min(e.y,f.y,g.y,h.y)+a/2)}function a(d,a){a=a||{};var n=a.L||0,p=(a.J||0)%360,q=(a.K||0)%360,u=(a.ab||0)%360,k=a.o,m=a.n,f=a.Ze;if(k==l)k=1;if(m==l)m=1;if(f==l)f=1;if(e){n=0;p=0;q=0;f=0}var c=new Cb(a.S,a.X,n);c.J(p);c.K(q);c.Yd(u);c.Xd(a.ub,a.vb);c.Ub(k,m,f);if(b){c.nb(a.p,a.q);d.style[g]=c.Vd()}else if(!X||X<9){var o="",j={x:0,y:0};if(a.G)j=i(c,a.G,a.W);h.be(d,j.y);h.ce(d,j.x);o=c.Ud();var s=d.style.filter,t=new RegExp(/[\s]*progid:DXImageTransform\.Microsoft\.Matrix\([^\)]*\)/g),r=H(s,[t],o);tb(d,r)}}w=function(e,c){c=c||{};var g=c.p,i=c.q,f;n(T,function(a,b){f=c[b];f!==l&&a(e,f)});h.ud(e,c.c);if(!b){g!=l&&h.C(e,(c.uc||0)+g);i!=l&&h.B(e,(c.mc||0)+i)}if(c.Td)if(d)rb(h.D(j,M,e,c));else a(e,c)};h.Bb=M;if(d)h.Bb=w;if(e)h.Bb=a;else if(!b)a=M;h.P=w;w(f,k)}h.Bb=w;h.P=w;function Cb(i,k,o){var d=this,b=[1,0,0,0,0,1,0,0,0,0,1,0,i||0,k||0,o||0,1],h=c.sin,g=c.cos,l=c.tan;function f(a){return a*c.PI/180}function n(a,b){return{x:a,y:b}}function m(c,e,l,m,o,r,t,u,w,z,A,C,E,b,f,k,a,g,i,n,p,q,s,v,x,y,B,D,F,d,h,j){return[c*a+e*p+l*x+m*F,c*g+e*q+l*y+m*d,c*i+e*s+l*B+m*h,c*n+e*v+l*D+m*j,o*a+r*p+t*x+u*F,o*g+r*q+t*y+u*d,o*i+r*s+t*B+u*h,o*n+r*v+t*D+u*j,w*a+z*p+A*x+C*F,w*g+z*q+A*y+C*d,w*i+z*s+A*B+C*h,w*n+z*v+A*D+C*j,E*a+b*p+f*x+k*F,E*g+b*q+f*y+k*d,E*i+b*s+f*B+k*h,E*n+b*v+f*D+k*j]}function e(c,a){return m.apply(j,(a||b).concat(c))}d.Ub=function(a,c,d){if(a!=1||c!=1||d!=1)b=e([a,0,0,0,0,c,0,0,0,0,d,0,0,0,0,1])};d.nb=function(a,c,d){b[12]+=a||0;b[13]+=c||0;b[14]+=d||0};d.J=function(c){if(c){a=f(c);var d=g(a),i=h(a);b=e([1,0,0,0,0,d,i,0,0,-i,d,0,0,0,0,1])}};d.K=function(c){if(c){a=f(c);var d=g(a),i=h(a);b=e([d,0,-i,0,0,1,0,0,i,0,d,0,0,0,0,1])}};d.Yd=function(c){if(c){a=f(c);var d=g(a),i=h(a);b=e([d,i,0,0,-i,d,0,0,0,0,1,0,0,0,0,1])}};d.Xd=function(a,c){if(a||c){i=f(a);k=f(c);b=e([1,l(k),0,0,l(i),1,0,0,0,0,1,0,0,0,0,1])}};d.U=function(c){var a=e(b,[1,0,0,0,0,1,0,0,0,0,1,0,c.x,c.y,0,1]);return n(a[12],a[13])};d.Vd=function(){return"matrix3d("+b.join(",")+")"};d.Ud=function(){return"progid:DXImageTransform.Microsoft.Matrix(M11="+b[0]+", M12="+b[4]+", M21="+b[1]+", M22="+b[5]+", SizingMethod='auto expand')"}}new function(){var a=this;function b(d,g){for(var j=d[0].length,i=d.length,h=g[0].length,f=[],c=0;c<i;c++)for(var k=f[c]=[],b=0;b<h;b++){for(var e=0,a=0;a<j;a++)e+=d[c][a]*g[a][b];k[b]=e}return f}a.o=function(b,c){return a.xc(b,c,0)};a.n=function(b,c){return a.xc(b,0,c)};a.xc=function(a,c,d){return b(a,[[c,0],[0,d]])};a.U=function(d,c){var a=b(d,[[c.x],[c.y]]);return u(a[0][0],a[1][0])}};var N={uc:0,mc:0,p:0,q:0,bb:1,o:1,n:1,ab:0,J:0,K:0,S:0,X:0,L:0,ub:0,vb:0};h.Pd=function(a){var c=a||{};if(a)if(b.Hc(a))c={hc:c};else if(b.Hc(a.c))c.c={hc:a.c};return c};h.Od=function(k,m,x,q,z,A,n){var a=m;if(k){a={};for(var g in m){var B=A[g]||1,w=z[g]||[0,1],f=(x-w[0])/w[1];f=c.min(c.max(f,0),1);f=f*B;var u=c.floor(f);if(f!=u)f-=u;var h=q.hc||e.Fd,i,C=k[g],o=m[g];if(b.Ne(o)){h=q[g]||h;var y=h(f);i=C+o*y}else{i=b.V({Ab:{}},k[g]);var v=q[g]||{};b.e(o.Ab||o,function(d,a){h=v[a]||v.hc||h;var c=h(f),b=d*c;i.Ab[a]=b;i[a]+=b})}a[g]=i}var t=b.e(m,function(b,a){return N[a]!=l});t&&b.e(N,function(c,b){if(a[b]==l&&k[b]!==l)a[b]=k[b]});if(t){if(a.bb)a.o=a.n=a.bb;a.G=n.G;a.W=n.W;a.Td=d}}if(m.c&&n.nb){var p=a.c.Ab,s=(p.k||0)+(p.u||0),r=(p.j||0)+(p.s||0);a.j=(a.j||0)+r;a.k=(a.k||0)+s;a.c.j-=r;a.c.s-=r;a.c.k-=s;a.c.u-=s}if(a.c&&b.vd()&&!a.c.k&&!a.c.j&&!a.c.q&&!a.c.p&&a.c.s==n.G&&a.c.u==n.W)a.c=j;return a}};function n(){var a=this,d=[];function i(a,b){d.push({kc:a,ic:b})}function h(a,c){b.e(d,function(b,e){b.kc==a&&b.ic===c&&d.splice(e,1)})}a.qb=a.addEventListener=i;a.removeEventListener=h;a.f=function(a){var c=[].slice.call(arguments,1);b.e(d,function(b){b.kc==a&&b.ic.apply(f,c)})}}var m=function(z,C,i,J,M,L){z=z||0;var a=this,q,n,o,u,A=0,G,H,F,B,y=0,h=0,m=0,D,l,g,e,p,w=[],x;function O(a){g+=a;e+=a;l+=a;h+=a;m+=a;y+=a}function t(o){var f=o;if(p&&(f>=e||f<=g))f=((f-g)%p+p)%p+g;if(!D||u||h!=f){var j=c.min(f,e);j=c.max(j,g);if(!D||u||j!=m){if(L){var k=(j-l)/(C||1);if(i.Jd)k=1-k;var n=b.Od(M,L,k,G,F,H,i);if(x)b.e(n,function(b,a){x[a]&&x[a](J,b)});else b.P(J,n)}a.Lb(m-l,j-l);m=j;b.e(w,function(b,c){var a=o<h?w[w.length-c-1]:b;a.O(m-y)});var r=h,q=m;h=f;D=d;a.xb(r,q)}}}function E(a,b,d){b&&a.Ob(e);if(!d){g=c.min(g,a.Cc()+y);e=c.max(e,a.Xb()+y)}w.push(a)}var r=f.requestAnimationFrame||f.webkitRequestAnimationFrame||f.mozRequestAnimationFrame||f.msRequestAnimationFrame;if(b.Re()&&b.tc()<7)r=j;r=r||function(a){b.rc(a,i.Bc)};function I(){if(q){var d=b.I(),e=c.min(d-A,i.Ac),a=h+e*o;A=d;if(a*o>=n*o)a=n;t(a);if(!u&&a*o>=n*o)K(B);else r(I)}}function s(f,i,j){if(!q){q=d;u=j;B=i;f=c.max(f,g);f=c.min(f,e);n=f;o=n<h?-1:1;a.zc();A=b.I();r(I)}}function K(b){if(q){u=q=B=k;a.yc();b&&b()}}a.Jc=function(a,b,c){s(a?h+a:e,b,c)};a.nc=s;a.Y=K;a.Ed=function(a){s(a)};a.F=function(){return h};a.Ec=function(){return n};a.jb=function(){return m};a.O=t;a.nb=function(a){t(h+a)};a.Ic=function(){return q};a.Ld=function(a){p=a};a.Ob=O;a.Fc=function(a,b){E(a,0,b)};a.gc=function(a){E(a,1)};a.Cc=function(){return g};a.Xb=function(){return e};a.xb=a.zc=a.yc=a.Lb=b.Gc;a.dc=b.I();i=b.V({Bc:16,Ac:50},i);p=i.qc;x=i.Zd;g=l=z;e=z+C;H=i.ae||{};F=i.Cd||{};G=b.Pd(i.hb)};new(function(){});var i=function(p,fc){var h=this;function Bc(){var a=this;m.call(a,-1e8,2e8);a.we=function(){var b=a.jb(),d=c.floor(b),f=t(d),e=b-c.floor(b);return{cb:f,Le:d,pb:e}};a.xb=function(b,a){var e=c.floor(a);if(e!=a&&a>b)e++;Tb(e,d);h.f(i.te,t(a),t(b),a,b)}}function Ac(){var a=this;m.call(a,0,0,{qc:r});b.e(C,function(b){D&1&&b.Ld(r);a.gc(b);b.Ob(kb/bc)})}function zc(){var a=this,b=Ub.T;m.call(a,-1,2,{hb:e.Hd,Zd:{pb:Zb},qc:r},b,{pb:1},{pb:-2});a.Tb=b}function mc(o,n){var b=this,e,f,g,l,c;m.call(b,-1e8,2e8,{Ac:100});b.zc=function(){M=d;R=j;h.f(i.qe,t(w.F()),w.F())};b.yc=function(){M=k;l=k;var a=w.we();h.f(i.oe,t(w.F()),w.F());!a.pb&&Dc(a.Le,s)};b.xb=function(i,h){var b;if(l)b=c;else{b=f;if(g){var d=h/g;b=a.me(d)*(f-e)+e}}w.O(b)};b.wb=function(a,d,c,h){e=a;f=d;g=c;w.O(a);b.O(0);b.nc(c,h)};b.le=function(a){l=d;c=a;b.Jc(a,j,d)};b.je=function(a){c=a};w=new Bc;w.Fc(o);w.Fc(n)}function oc(){var c=this,a=Xb();b.z(a,0);b.E(a,"pointerEvents","none");c.T=a;c.sb=function(){b.Q(a);b.Yb(a)}}function xc(o,f){var e=this,q,M,v,l,y=[],x,B,W,H,S,F,g,w,p;m.call(e,-u,u+1,{});function E(a){q&&q.Nc();T(o,a,0);F=d;q=new I.R(o,I,b.Bd(b.g(o,"idle"))||lc);q.O(0)}function Z(){q.dc<I.dc&&E()}function O(p,r,o){if(!H){H=d;if(l&&o){var g=o.width,c=o.height,n=g,m=c;if(g&&c&&a.db){if(a.db&3&&(!(a.db&4)||g>K||c>J)){var j=k,q=K/J*c/g;if(a.db&1)j=q>1;else if(a.db&2)j=q<1;n=j?g*J/c:K;m=j?J:c*K/g}b.i(l,n);b.l(l,m);b.B(l,(J-m)/2);b.C(l,(K-n)/2)}b.r(l,"absolute");h.f(i.Ie,f)}}b.Q(r);p&&p(e)}function Y(b,c,d,g){if(g==R&&s==f&&N)if(!Cc){var a=t(b);A.pd(a,f,c,e,d);c.Qe();U.Ob(a-U.Cc()-1);U.O(a);z.wb(b,b,0)}}function bb(b){if(b==R&&s==f){if(!g){var a=j;if(A)if(A.cb==f)a=A.ke();else A.sb();Z();g=new vc(o,f,a,q);g.Uc(p)}!g.Ic()&&g.Kb()}}function G(d,h,l){if(d==f){if(d!=h)C[h]&&C[h].Xc();else!l&&g&&g.re();p&&p.wc();var m=R=b.I();e.gb(b.D(j,bb,m))}else{var k=c.min(f,d),i=c.max(f,d),o=c.min(i-k,k+r-i),n=u+a.ve-1;(!S||o<=n)&&e.gb()}}function db(){if(s==f&&g){g.Y();p&&p.se();p&&p.ne();g.Qc()}}function eb(){s==f&&g&&g.Y()}function ab(a){!P&&h.f(i.ie,f,a)}function Q(){p=w.pInstance;g&&g.Uc(p)}e.gb=function(c,a){a=a||v;if(y.length&&!H){b.N(a);if(!W){W=d;h.f(i.Be,f);b.e(y,function(a){if(!b.m(a,"src")){a.src=b.g(a,"src2");b.M(a,a["display-origin"])}})}b.Rd(y,l,b.D(j,O,c,a))}else O(c,a)};e.Pe=function(){var i=f;if(a.id<0)i-=r;var d=i+a.id*tc;if(D&2)d=t(d);if(!(D&1)&&!ib)d=c.max(0,c.min(d,r-u));if(d!=f){if(A){var g=A.Ke(r);if(g){var k=R=b.I(),h=C[t(d)];return h.gb(b.D(j,Y,d,h,g,k),v)}}cb(d)}else if(a.eb){e.Xc();G(f,f)}};e.fc=function(){G(f,f,d)};e.Xc=function(){p&&p.se();p&&p.ne();e.ad();g&&g.De();g=j;E()};e.Qe=function(){b.Q(o)};e.ad=function(){b.N(o)};e.zd=function(){p&&p.wc()};function T(a,c,e){if(b.m(a,"jssor-slider"))return;if(!F){if(a.tagName=="IMG"){y.push(a);if(!b.m(a,"src")){S=d;a["display-origin"]=b.M(a);b.Q(a)}}b.Kc()&&b.z(a,(b.z(a)||0)+1)}var f=b.zb(a);b.e(f,function(f){var h=f.tagName,i=b.g(f,"u");if(i=="player"&&!w){w=f;if(w.pInstance)Q();else b.a(w,"dataavailable",Q)}if(i=="caption"){if(c){b.Lc(f,b.g(f,"to"));b.He(f,b.g(f,"bf"));b.g(f,"3d")&&b.he(f,"preserve-3d")}else if(!b.fd()){var g=b.fb(f,k,d);b.Fb(g,f,a);b.Gb(f,a);f=g;c=d}}else if(!F&&!e&&!l){if(h=="A"){if(b.g(f,"u")=="image")l=b.ye(f,"IMG");else l=b.v(f,"image",d);if(l){x=f;b.M(x,"block");b.P(x,V);B=b.fb(x,d);b.r(x,"relative");b.cc(B,0);b.E(B,"backgroundColor","#000")}}else if(h=="IMG"&&b.g(f,"u")=="image")l=f;if(l){l.border=0;b.P(l,V)}}T(f,c,e+1)})}e.Lb=function(c,b){var a=u-b;Zb(M,a)};e.cb=f;n.call(e);b.Ce(o,b.g(o,"p"));b.Ee(o,b.g(o,"po"));var L=b.v(o,"thumb",d);if(L){b.fb(L);b.Q(L)}b.N(o);v=b.fb(gb);b.z(v,1e3);b.a(o,"click",ab);E(d);e.Me=l;e.Wc=B;e.Tb=M=o;b.H(M,v);h.qb(203,G);h.qb(28,eb);h.qb(24,db)}function vc(y,f,p,q){var a=this,n=0,u=0,g,j,e,c,l,t,r,o=C[f];m.call(a,0,0);function v(){b.Yb(L);cc&&l&&o.Wc&&b.H(L,o.Wc);b.N(L,!l&&o.Me)}function w(){a.Kb()}function x(b){r=b;a.Y();a.Kb()}a.Kb=function(){var b=a.jb();if(!B&&!M&&!r&&s==f){if(!b){if(g&&!l){l=d;a.Qc(d);h.f(i.wd,f,n,u,g,c)}v()}var k,p=i.Tc;if(b!=c)if(b==e)k=c;else if(b==j)k=e;else if(!b)k=j;else k=a.Ec();h.f(p,f,b,n,j,e,c);var m=N&&(!E||F);if(b==c)(e!=c&&!(E&12)||m)&&o.Pe();else(m||b!=e)&&a.nc(k,w)}};a.re=function(){e==c&&e==a.jb()&&a.O(j)};a.De=function(){A&&A.cb==f&&A.sb();var b=a.jb();b<c&&h.f(i.Tc,f,-b-1,n,j,e,c)};a.Qc=function(a){p&&b.tb(lb,a&&p.sc.We?"":"hidden")};a.Lb=function(b,a){if(l&&a>=g){l=k;v();o.ad();A.sb();h.f(i.td,f,n,u,g,c)}h.f(i.sd,f,a,n,j,e,c)};a.Uc=function(a){if(a&&!t){t=a;a.qb($JssorPlayer$.nd,x)}};p&&a.gc(p);g=a.Xb();a.gc(q);j=g+q.Mc;e=g+q.Rc;c=a.Xb()}function Kb(a,c,d){b.C(a,c);b.B(a,d)}function Zb(c,b){var a=x>0?x:fb,d=zb*b*(a&1),e=Ab*b*(a>>1&1);Kb(c,d,e)}function Pb(){qb=M;Ib=z.Ec();G=w.F()}function gc(){Pb();if(B||!F&&E&12){z.Y();h.f(i.ge)}}function ec(f){if(!B&&(F||!(E&12))&&!z.Ic()){var d=w.F(),b=c.ceil(G);if(f&&c.abs(H)>=a.hd){b=c.ceil(d);b+=jb}if(!(D&1))b=c.min(r-u,c.max(b,0));var e=c.abs(b-d);e=1-c.pow(1-e,5);if(!P&&qb)z.Ed(Ib);else if(d==b){tb.zd();tb.fc()}else z.wb(d,b,e*Vb)}}function Hb(a){!b.g(b.Vb(a),"nodrag")&&b.yb(a)}function rc(a){Yb(a,1)}function Yb(a,c){a=b.vc(a);var l=b.Vb(a);if(!O&&!b.g(l,"nodrag")&&sc()&&(!c||a.touches.length==1)){B=d;yb=k;R=j;b.a(g,c?"touchmove":"mousemove",Bb);b.I();P=0;gc();if(!qb)x=0;if(c){var f=a.touches[0];ub=f.clientX;vb=f.clientY}else{var e=b.oc(a);ub=e.x;vb=e.y}H=0;hb=0;jb=0;h.f(i.Ad,t(G),G,a)}}function Bb(e){if(B){e=b.vc(e);var f;if(e.type!="mousemove"){var l=e.touches[0];f={x:l.clientX,y:l.clientY}}else f=b.oc(e);if(f){var j=f.x-ub,k=f.y-vb;if(c.floor(G)!=G)x=x||fb&O;if((j||k)&&!x){if(O==3)if(c.abs(k)>c.abs(j))x=2;else x=1;else x=O;if(ob&&x==1&&c.abs(k)-c.abs(j)>3)yb=d}if(x){var a=k,i=Ab;if(x==1){a=j;i=zb}if(!(D&1)){if(a>0){var g=i*s,h=a-g;if(h>0)a=g+c.sqrt(h)*5}if(a<0){var g=i*(r-u-s),h=-a-g;if(h>0)a=-g-c.sqrt(h)*5}}if(H-hb<-2)jb=0;else if(H-hb>2)jb=-1;hb=H;H=a;sb=G-H/i/(Y||1);if(H&&x&&!yb){b.yb(e);if(!M)z.le(sb);else z.je(sb)}}}}}function bb(){qc();if(B){B=k;b.I();b.A(g,"mousemove",Bb);b.A(g,"touchmove",Bb);P=H;z.Y();var a=w.F();h.f(i.od,t(a),a,t(G),G);E&12&&Pb();ec(d)}}function jc(c){if(P){b.xe(c);var a=b.Vb(c);while(a&&v!==a){a.tagName=="A"&&b.yb(c);try{a=a.parentNode}catch(d){break}}}}function Jb(a){C[s];s=t(a);tb=C[s];Tb(a);return s}function Dc(a,b){x=0;Jb(a);h.f(i.kd,t(a),b)}function Tb(a,c){wb=a;b.e(S,function(b){b.jc(t(a),a,c)})}function sc(){var b=i.gd||0,a=X;if(ob)a&1&&(a&=1);i.gd|=a;return O=a&~b}function qc(){if(O){i.gd&=~X;O=0}}function Xb(){var a=b.Eb();b.P(a,V);b.r(a,"absolute");return a}function t(a){return(a%r+r)%r}function kc(b,d){if(d)if(!D){b=c.min(c.max(b+wb,0),r-u);d=k}else if(D&2){b=t(b+wb);d=k}cb(b,a.Ib,d)}function xb(){b.e(S,function(a){a.Nb(a.Hb.Xe<=F)})}function hc(){if(!F){F=1;xb();if(!B){E&12&&ec();E&3&&C[s].fc()}}}function Ec(){if(F){F=0;xb();B||!(E&12)||gc()}}function ic(){V={Db:K,rb:J,k:0,j:0};b.e(T,function(a){b.P(a,V);b.r(a,"absolute");b.tb(a,"hidden");b.Q(a)});b.P(gb,V)}function ab(b,a){cb(b,a,d)}function cb(g,f,j){if(Rb&&(!B&&(F||!(E&12))||a.Zc)){M=d;B=k;z.Y();if(f==l)f=Vb;var e=Cb.jb(),b=g;if(j){b=e+g;if(g>0)b=c.ceil(b);else b=c.floor(b)}if(D&2)b=t(b);if(!(D&1))b=c.max(0,c.min(b,r-u));var i=(b-e)%r;b=e+i;var h=e==b?0:f*c.abs(i);h=c.min(h,f*u*1.5);z.wb(e,b,h||1)}}h.Jc=function(){if(!N){N=d;C[s]&&C[s].fc()}};function W(){return b.i(y||p)}function nb(){return b.l(y||p)}h.G=W;h.W=nb;function Eb(c,d){if(c==l)return b.i(p);if(!y){var a=b.Eb(g);b.Dc(a,b.Dc(p));b.Cb(a,b.Cb(p));b.M(a,"block");b.r(a,"relative");b.B(a,0);b.C(a,0);b.tb(a,"visible");y=b.Eb(g);b.r(y,"absolute");b.B(y,0);b.C(y,0);b.i(y,b.i(p));b.l(y,b.l(p));b.Lc(y,"0 0");b.H(y,a);var h=b.zb(p);b.H(p,y);b.E(p,"backgroundImage","");b.e(h,function(c){b.H(b.g(c,"noscale")?p:a,c);b.g(c,"autocenter")&&Lb.push(c)})}Y=c/(d?b.l:b.i)(y);b.Fe(y,Y);var f=d?Y*W():c,e=d?c:Y*nb();b.i(p,f);b.l(p,e);b.e(Lb,function(a){var c=b.rd(b.g(a,"autocenter"));b.md(a,c)})}h.Wd=Eb;n.call(h);h.T=p=b.ib(p);var a=b.V({db:0,ve:1,Rb:1,ec:0,Mb:k,eb:1,mb:d,Zc:d,id:1,Vc:3e3,Oc:1,Ib:500,me:e.Id,hd:20,Pc:0,Z:1,ac:0,ee:1,bc:1,Sc:1},fc);a.mb=a.mb&&b.qd();if(a.Sd!=l)a.Vc=a.Sd;if(a.Qd!=l)a.ac=a.Qd;var fb=a.bc&3,tc=(a.bc&4)/-4||1,mb=a.Ye,I=b.V({R:q,mb:a.mb},a.Te);I.Wb=I.Wb||I.Se;var Fb=a.Nd,Z=a.Md,eb=a.Ve,Q=!a.ee,y,v=b.v(p,"slides",Q),gb=b.v(p,"loading",Q)||b.Eb(g),Nb=b.v(p,"navigator",Q),dc=b.v(p,"arrowleft",Q),ac=b.v(p,"arrowright",Q),Mb=b.v(p,"thumbnavigator",Q),pc=b.i(v),nc=b.l(v),V,T=[],uc=b.zb(v);b.e(uc,function(a){if(a.tagName=="DIV"&&!b.g(a,"u"))T.push(a);else b.Kc()&&b.z(a,(b.z(a)||0)+1)});var s=-1,wb,tb,r=T.length,K=a.Yc||pc,J=a.Kd||nc,Wb=a.Pc,zb=K+Wb,Ab=J+Wb,bc=fb&1?zb:Ab,u=c.min(a.Z,r),lb,x,O,yb,S=[],Qb,Sb,Ob,cc,Cc,N,E=a.Oc,lc=a.Vc,Vb=a.Ib,rb,ib,kb,Rb=u<r,D=Rb?a.eb:0,X,P,F=1,M,B,R,ub=0,vb=0,H,hb,jb,Cb,w,U,z,Ub=new oc,Y,Lb=[];if(r){if(a.mb)Kb=function(a,c,d){b.Bb(a,{S:c,X:d})};N=a.Mb;h.Hb=fc;ic();b.m(p,"jssor-slider",d);b.z(v,b.z(v)||0);b.r(v,"absolute");lb=b.fb(v,d);b.Fb(lb,v);if(mb){cc=mb.Ue;rb=mb.R;ib=u==1&&r>1&&rb&&(!b.fd()||b.tc()>=8)}kb=ib||u>=r||!(D&1)?0:a.ac;X=(u>1||kb?fb:-1)&a.Sc;var Gb=v,C=[],A,L,Db=b.Oe(),ob=Db.Ae,G,qb,Ib,sb;Db.jd&&b.E(Gb,Db.jd,([j,"pan-y","pan-x","none"])[X]||"");U=new zc;if(ib)A=new rb(Ub,K,J,mb,ob);b.H(lb,U.Tb);b.tb(v,"hidden");L=Xb();b.E(L,"backgroundColor","#000");b.cc(L,0);b.Fb(L,Gb.firstChild,Gb);for(var db=0;db<T.length;db++){var wc=T[db],yc=new xc(wc,db);C.push(yc)}b.Q(gb);Cb=new Ac;z=new mc(Cb,U);b.a(v,"click",jc,d);b.a(p,"mouseout",b.Zb(hc,p));b.a(p,"mouseover",b.Zb(Ec,p));if(X){b.a(v,"mousedown",Yb);b.a(v,"touchstart",rc);b.a(v,"dragstart",Hb);b.a(v,"selectstart",Hb);b.a(g,"mouseup",bb);b.a(g,"touchend",bb);b.a(g,"touchcancel",bb);b.a(f,"blur",bb)}E&=ob?10:5;if(Nb&&Fb){Qb=new Fb.R(Nb,Fb,W(),nb());S.push(Qb)}if(Z&&dc&&ac){Z.eb=D;Z.Z=u;Sb=new Z.R(dc,ac,Z,W(),nb());S.push(Sb)}if(Mb&&eb){eb.ec=a.ec;Ob=new eb.R(Mb,eb);S.push(Ob)}b.e(S,function(a){a.Qb(r,C,gb);a.qb(o.Jb,kc)});b.E(p,"visibility","visible");Eb(W());xb();a.Rb&&b.a(g,"keydown",function(b){if(b.keyCode==37)ab(-a.Rb);else b.keyCode==39&&ab(a.Rb)});var pb=a.ec;if(!(D&1))pb=c.max(0,c.min(pb,r-u));z.wb(pb,pb,0)}};i.ie=21;i.Ad=22;i.od=23;i.qe=24;i.oe=25;i.Be=26;i.Ie=27;i.ge=28;i.te=202;i.kd=203;i.wd=206;i.td=207;i.sd=208;i.Tc=209;var o={Jb:1},r=function(e,C){var f=this;n.call(f);e=b.ib(e);var s,A,z,r,l=0,a,m,i,w,x,h,g,q,p,B=[],y=[];function v(a){a!=-1&&y[a].de(a==l)}function t(a){f.f(o.Jb,a*m)}f.T=e;f.jc=function(a){if(a!=r){var d=l,b=c.floor(a/m);l=b;r=a;v(d);v(b)}};f.Nb=function(a){b.N(e,a)};var u;f.Qb=function(D){if(!u){s=c.ceil(D/m);l=0;var o=q+w,r=p+x,n=c.ceil(s/i)-1;A=q+o*(!h?n:i-1);z=p+r*(h?n:i-1);b.i(e,A);b.l(e,z);for(var f=0;f<s;f++){var C=b.Ge();b.ue(C,f+1);var k=b.Dd(g,"numbertemplate",C,d);b.r(k,"absolute");var v=f%(n+1);b.C(k,!h?o*v:f%i*o);b.B(k,h?r*v:c.floor(f/(n+1))*r);b.H(e,k);B[f]=k;a.Pb&1&&b.a(k,"click",b.D(j,t,f));a.Pb&2&&b.a(k,"mouseover",b.Zb(b.D(j,t,f),k));y[f]=b.Sb(k)}u=d}};f.Hb=a=b.V({ed:10,dd:10,cd:1,Pb:1},C);g=b.v(e,"prototype");q=b.i(g);p=b.l(g);b.Gb(g,e);m=a.bd||1;i=a.yd||1;w=a.ed;x=a.dd;h=a.cd-1;a.Ub==k&&b.m(e,"noscale",d);a.lb&&b.m(e,"autocenter",a.lb)},s=function(a,g,h){var c=this;n.call(c);var r,q,e,f,i;b.i(a);b.l(a);function l(a){c.f(o.Jb,a,d)}function p(c){b.N(a,c||!h.eb&&e==0);b.N(g,c||!h.eb&&e>=q-h.Z);r=c}c.jc=function(b,a,c){if(c)e=a;else{e=b;p(r)}};c.Nb=p;var m;c.Qb=function(c){q=c;e=0;if(!m){b.a(a,"click",b.D(j,l,-i));b.a(g,"click",b.D(j,l,i));b.Sb(a);b.Sb(g);m=d}};c.Hb=f=b.V({bd:1},h);i=f.bd;if(f.Ub==k){b.m(a,"noscale",d);b.m(g,"noscale",d)}if(f.lb){b.m(a,"autocenter",f.lb);b.m(g,"autocenter",f.lb)}};function q(e,d,c){var a=this;m.call(a,0,c);a.Nc=b.Gc;a.Mc=0;a.Rc=c}jssor_1_slider_init=function(){var g={Mb:d,Yc:600,Z:2,ac:100,Md:{R:s},Nd:{R:r}},e=new i("jssor_1",g);function a(){var b=e.T.parentNode.clientWidth;if(b){b=c.min(b,800);e.Wd(b)}else f.setTimeout(a,30)}a();b.a(f,"load",a);b.a(f,"resize",a);b.a(f,"orientationchange",a)}})(window,document,Math,null,true,false)
</script>

<style>
.jssorb01{position:absolute}.jssorb01 div,.jssorb01 div:hover,.jssorb01 .av{position:absolute;width:12px;height:12px;filter:alpha(opacity=70);opacity:.7;overflow:hidden;cursor:pointer;border:#000 1px solid}.jssorb01 div{background-color:gray}.jssorb01 div:hover,.jssorb01 .av:hover{background-color:#d3d3d3}.jssorb01 .av{background-color:#fff}.jssorb01 .dn,.jssorb01 .dn:hover{background-color:#555}.jssora13l,.jssora13r{display:block;position:absolute;width:40px;height:50px;cursor:pointer;background:url('img/a13.png') no-repeat;overflow:hidden}.jssora13l{background-position:-10px -35px}.jssora13r{background-position:-70px -35px}.jssora13l:hover{background-position:-130px -35px}.jssora13r:hover{background-position:-190px -35px}.jssora13l.jssora13ldn{background-position:-250px -35px}.jssora13r.jssora13rdn{background-position:-310px -35px}.jssora13l.jssora13lds{background-position:-10px -35px;opacity:.3;pointer-events:none}.jssora13r.jssora13rds{background-position:-70px -35px;opacity:.3;pointer-events:none}
</style>
	
	<!-- http://www.456bereastreet.com/archive/201209/tell_css_tdat_javascript_is_available_asap/ -->
	<script>
		document.documentElement.className = document.documentElement.className.replace(/(\s|^)no-js(\s|$)/, '$1js$2');
	</script>
  
	<!-- Support for HTML5 -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Enable media queries on older browsers -->
	<!--[if lt IE 9]>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
  
	<script src="js/modernizr.js"></script>
  </head>
<body>

<?php
	include "header.php";
?>
   
    
                <h3 align="center">Welcome <?php echo $row['dealer_first_name']." ".$row['dealer_last_name']; ?></h3>
                <hr>			
		
			<div class="container clearfix">
	
    				
				<div>  
				
 				
 <DIV style="width:100%;background:url(images/logo1.bmp)">
	
	
	<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 800px; height: 400px; overflow: hidden; visibility: hidden;border:solid black 1px;">
<!-- Loading Screen -->
<div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
<div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
</div>
<div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 100%; height: 400px; overflow: hidden;">
<div data-p="112.50">
<img data-u="image" src="img/111.jpg" />
</div>
<!-----div data-p="112.50" style="display: none;">
<img data-u="image" src="img/222.png" />
</div---->


<div data-p="112.50" style="display: none;">
<img data-u="image" src="img/333.png" />
</div>

<div data-p="112.50" style="display: none;">
<img data-u="image" src="img/444.jpg" />
</div>

<div data-p="112.50" style="display: none;">
<img data-u="image" src="img/555.jpg" />
</div>

<div data-p="112.50" style="display: none;">
<img data-u="image" src="img/666.png" />
</div>
</div>
<!-- Bullet Navigator -->
<div data-u="navigator" class="jssorb01" style="bottom:16px;right:16px;" data-autocenter="1">
<div data-u="prototype" style="width:12px;height:12px;"></div>
</div>
<!-- Arrow Navigator -->
<span data-u="arrowleft" class="jssora13l" style="top:0px;left:30px;width:40px;height:50px;" data-autocenter="2"></span>
<span data-u="arrowright" class="jssora13r" style="top:0px;right:30px;width:40px;height:50px;" data-autocenter="2"></span>
</div>
<script type="text/javascript">jssor_1_slider_init();</script>
<!-- #endregion Jssor Slider End -->

	
	
	<!-- /.content -->
  </div>
			
				</div><!-- end col-->
            </div><!-- end content -->
   
  
<?php
	include "footer.php";
?>
    
    <div class="dmtop">Scroll to Top</div>

      <!-- Main Scripts-->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.unveilEffects.js"></script>	
	<script src="js/retina-1.1.0.js"></script>
	<script src="js/jquery.hoverex.min.js"></script>
	<script src="js/jquery.hoverdir.js"></script>
    <script src="js/owl.carousel.js"></script>	
    <script src="js/jetmenu.js"></script>	
	<script src="js/jquery.hoverex.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/custom.js"></script>
	</body>
</html>








