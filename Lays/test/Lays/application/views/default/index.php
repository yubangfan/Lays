<!--{template header}-->

{if $this->user['uid']}
{if $_SESSION['info']}
<!--{template 'chat_index','chat'}-->
{/if}
{/if}

<div class="wrapper clearfix">

 <div class="l-content">
    <style>
.article .text a.check-text{}
.article .text a.check-text:hover{color:#666;text-decoration:none}
</style>
<div class="Card Topstory-noMarginCard Topstory-tabCard">
<ul role="tablist" class="Tabs">
<li role="tab" class="Tabs-item Tabs-item--noMeta" aria-controls="Topstory-recommend">
<a class="Tabs-link {if !$_valname}is-active{/if}" href="{SITE_URL}">最新</a></li>
<li role="tab" class="Tabs-item Tabs-item--noMeta" aria-controls="Topstory-hot">
<a class="Tabs-link {if $_valname=='xuanshang'}is-active{/if}" href="{url content/xuanshang}">悬赏</a></li>
<li role="tab" class="Tabs-item Tabs-item--noMeta" aria-controls="Topstory-follow">
<a class="Tabs-link {if $_valname=='tuijian'}is-active{/if}" href="{url content/tuijian}">推荐</a></li>
<li role="tab" class="Tabs-item Tabs-item--noMeta" aria-controls="Topstory-follow">
<a class="Tabs-link  {if $_valname=='solve'}is-active{/if}" href="{url content/solve}">热门</a></li>
<li role="tab" class="Tabs-item Tabs-item--noMeta" aria-controls="Topstory-follow">
<a class="Tabs-link {if $_valname=='nosolve'}is-active{/if}" href="{url content/nosolve}">等待解答</a></li>
</ul><div><div><div class="Sticky" style=""></div></div></div></div>


    
<div class="l-list">
  <ul class="problemlist" id="loadul">
{if !$_valname||$_valname=='new'}

  
    <!--{eval $topdatalist=$this->fromcache('topdata');}-->
                <!--{loop $topdatalist  $topdata}-->

<li class="pl-item bb p-question-answers bf bb">
        <!-- 如果是普通问答 -->
                <h3><a target="_blank" href="{$topdata['url']}">{$topdata['title']}
              
                <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="站内顶置"><i class="fa fa-ding mar-r-03"></i></span>
               
                </a></h3>
        <div class="person">
          <div class="figure"><a target="_blank" href="{url user/space/$topdata['model']['authorid']}"><img src="{$topdata['model']['avatar']}" alt=""></a></div>
          <div class="other" style="margin-top:9px;margin-bottom:5px;">
             <p class="name"><a target="_blank" href="{url user/space/$topdata['model']['authorid']}">{$topdata['model']['author']}{if $topdata['author_has_vertify']!=false}<i class="fa fa-vimeo {if $topdata['author_has_vertify'][0]=='0'}v_person {else}v_company {/if}  " data-toggle="tooltip" data-placement="right" title="" {if $topdata['author_has_vertify'][0]=='0'}data-original-title="认证用户" {else}data-original-title="认证用户" {/if} ></i>{/if}</a> </p>
             <p></p>
          </div>
        </div>
        
        <div class="article  {if $topdata['model']['image']} apic {/if}">
   
                     {if $topdata['model']['image']}
                      <div class="figure"><a href="{$topdata['url']}" target="_blank"><img src="$topdata['model']['image']"  alt=""></a></div>
                      {/if}
                      {if $topdata['description']}
                      <div class="text">
              <a href="{$topdata['url']}" class="check-text">{eval echo clearhtml($topdata['description'],100);}</a>
              <a target="_blank" href="{$topdata['url']}" class="check-all">查看全文</a>
           </div>
             {/if}
        </div>
        <div class="ask-bottom">
     
          <a href="{$topdata['url']}" class="" ><i class="fa fa-commentingicon"></i>{$topdata['answers']} 个回复</a>
          <a href="{$topdata['url']}"  class=" "><i class="fa fa-qshoucang"></i>{$topdata['attentions']}个收藏</a>
             </div>
     </li>
     

     <!--{/loop}-->
     
  
  {if !$_valname}
                       <!--{eval $doinglist=$this->fromcache('doinglist');}-->
        {/if}           
                                    <!--{loop $doinglist $doing}-->
                          <li class="pl-item bb p-question-answers bf bb">
        <!-- 如果是普通问答 -->
                <h3><a target="_blank" href="{$doing['url']}">{$doing['content']}{if $doing['question']['price']}<label class="tit-money">奖励$doing['question']['price']财富值</label>{/if}{if $doing['question']['shangjin']}
               
                <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="如果回答被采纳将获得 $doing['question']['shangjin']元，可提现" class="icon_hot"><i class="fa fa-hongbao mar-r-03"></i>悬赏$doing['question']['shangjin']元</span>
               
                {/if}</a></h3>
        <div class="person">
        {if $doing['hidden']==1}
           <div class="figure"><a target="_blank"><img src="{SITE_URL}static/css/default/avatar.gif" alt=""></a></div>
          <div class="other" style="margin-top:9px;margin-bottom:5px;">
             <p class="name"><a target="_blank" >匿名用户</a> </p>
             <p></p>
          </div>
        {else}
           <div class="figure"><a target="_blank" href="{url user/space/$doing['authorid']}"><img src="{$doing['avatar']}" alt=""></a></div>
          <div class="other" style="margin-top:9px;margin-bottom:5px;">
             <p class="name"><a target="_blank" href="{url user/space/$doing['authorid']}">{$doing['author']}</a> </p>
             <p></p>
          </div>
        {/if}
       
        </div>
        
        <div class="article  {if $doing['image']} apic {/if}">
                     {if $doing['image']}
                      <div class="figure"><a href="{$doing['url']}" target="_blank"><img src="$doing['image']"  alt=""></a></div>
                      {/if}
                      {if $doing['description']}
                      <div class="text">
              <a href="{$doing['url']}" class="check-text">{$doing['description']}</a>
              <a target="_blank" href="{$doing['url']}" class="check-all">查看全文</a>
           </div>
             {/if}
        </div>
        <div class="ask-bottom">

          <a href="{$doing['url']}" class="" ><i class="fa fa-commentingicon"></i>{$doing['answers']} 个{if $doing['action']==9}评论{else}回复{/if}</a>
          <a href="{$doing['url']}"  class=" "><i class="fa fa-qshoucang"></i>{$doing['attentions']}个收藏</a>
         <span class="from"><a target="_blank" href="{url category/view/$doing['cid']}">来自话题:{$doing['categoryname']}</a></span>        </div>
     </li>
                  <!--{/loop}-->         
  
     {else}

                     
                                    <!--{loop $questionlist $question}-->
                          <li class="pl-item bb p-question-answers bf bb">
        <!-- 如果是普通问答 -->
                <h3><a target="_blank" href="{url question/view/$question['id']}">{$question['title']}{if $question['price']}<label class="tit-money">奖励$question['price']财富值</label>{/if}{if $question['shangjin']}
              
                  <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="如果回答被采纳将获得 $question['shangjin']元，可提现" class="icon_hot"><i class="fa fa-hongbao mar-r-03"></i>悬赏$question['shangjin']元</span>
               
                {/if}</a></h3>
        <div class="person">
          <div class="figure"><a target="_blank" {if !$question['hidden']}href="{url user/space/$question['authorid']}"{/if}><img src="{$question['avatar']}" alt=""></a></div>
          <div class="other" style="margin-top:9px;">
             <p class="name"><a target="_blank" {if !$question['hidden']}href="{url user/space/$question['authorid']}" {/if}>{$question['author']}</a> </p>
             <p></p>
          </div>
        </div>
        
        <div class="article  {if $question['image']} apic {/if}">
   
                     {if $question['image']}
                      <div class="figure"><a href="{url question/view/$question['id']}" target="_blank"><img src="$question['image']"  alt=""></a></div>
                      {/if}
                      {if $question['description']}
                      <div class="text">
              <a href="{url question/view/$question['id']}" class="check-text">{$question['description']}</a>
              <a target="_blank" href="{url question/view/$question['id']}" class="check-all">查看全文</a>
           </div>
             {/if}
        </div>
        <div class="ask-bottom">
   
          <a href="{url question/view/$question['id']}" class="" ><i class="fa fa-commentingicon"></i>{$question['answers']} 个回复</a>
          <a href="{url question/view/$question['id']}"  class=" "><i class="fa fa-qshoucang"></i>{$question['attentions']}个收藏</a>
         <span class="from"><a target="_blank" href="{url category/view/$question['cid']}">来自话题:{$question['category_name']}</a></span>        </div>
     </li>
                  <!--{/loop}-->         
     </ul>
     {/if}
     <div class="pages">{$departstr}</div>
 </div>



 
      </div><!-- l-content end -->
  <div class="r-aside">
  {if $user['uid']==0} 
  <div class="no-login bb">
         <div class="title">
           <h5>{$setting['site_name']}</h5>
           <p>欢迎加入我们成为社区一员</p>
         </div>
         <p class="inst">您还没有登录，点击 <a href="javascript:login()">登录</a></p>
     </div>
      {else}
            <div class="user-info bb">
         <div class="user">
             <div class="figure"><a href="{url user/default}" target="_blank"><img src="{$user['avatar']}" alt=""></a></div>
             <p class="f-title">欢迎您，{if $this->user['vip']}
                 {eval echo $this->user['vip']['iickname']}
                 {else}
                 {$user['username']}
                 {/if}
             </p>
         </div>
          <p class="inst">您已获得&nbsp;<span class="s1">{$user['supports']}</span>赞</p>
          
          <p class="inst">采纳率&nbsp;<span class="s1">{eval echo $this->user_model->adoptpercent ( $this->user );}</span>%</p>
           {if $setting['openwxpay']==1}
          <p class="inst">拥有现金&nbsp;<span class="s1">{eval echo doubleval($user['jine']/100);}</span>元</p>
            {/if}
           <p class="inst">拥有&nbsp;<span class="s1">{$user['credit2']}财富值</span></p>
       
        <div class="show">
             <a href="{url user/ask}" target="_blank"><span class="mypro">我的提问<br><font>{$user['questions']}</font></span></a>
             <a href="{url user/answer}" target="_blank"><span>我的回答<br><font>{$user['answers']}</font></span></a>
        </div>
      </div>
      
           {/if}
      <div class="no-login bb">
         <div class="btns">
            <a target="_blank" href="{url question/add}"><i class="fa fa-pencil"></i><span class="my-ask">&nbsp;我要提问</span></a>
            <a target="_blank" href="{url newpage/index/5}"><i class="fa fa-pencil"></i><span class="my-answer">&nbsp;我要回答</span></a>
         </div>
     </div>
       {if $user['uid']!=0} 
      <div class="problems bb">
        <p class="iconshoucang"><i class="fa"></i>我收藏的问题&nbsp;:<a target="_blank" href="{url attention/question}"><font>{$user['attentions']}</font></a></p>
        <p class="iconinvateme"><i class="fa"></i>邀请我回答的问题&nbsp;:<a href="{url user/invateme}" target="_blank"><font>{eval echo returnarraynum ( $this->db->query ( getwheresql ( 'question', " askuid=" . $user['uid'], $this->db->dbprefix ) )->row_array () );}</font></a></p>
       <p class="iconwenzhang"><i class="fa"></i><a target="_blank" href="{url topic/userxinzhi/$user['uid']}">我的文章</a></p>
            {if $setting['recharge_open']==1}   
        <p class="iconcaifu"><i class="fa"></i><a target="_blank" href="{url gift}">财富值兑换</a></p>
                 {/if}
            {if $setting['openwxpay']==1}
        <p class="iconjiaoyi"><i class="fa"></i><a target="_blank" href="{url user/userzhangdan}">交易明细</a></p>
        {/if}
      </div>
         {/if}
    
          <div style="margin-top:10px;" class="recommend bb">
         <h3 class="title">为你推荐</h3>
         <ul class="r-list">
                      <!--{eval $topiclist=$this->fromcache('hottopiclist');}-->
                 <!--{loop $topiclist $nindex $topic}-->
                                          
           <li>
              <i></i><a target="_blank" href="{url topic/getone/$topic['id']}" class="tit" title="{$topic['title']}">{$topic['title']}</a>
                         </li>
                    <!--{/loop}-->
           
                    
         </ul>
     </div> <!-- recommend end -->
               <div class="experts bb">
        <h3 class="title">问答专家 <a target="_blank" href="{url expert/default}" class="more">更多<font> &gt;&gt; </font></a></h3>
        <ul class="exp-list">
             <!--{eval $expertlist=$this->fromcache('expertlist');}-->
                <!--{loop $expertlist $index $expert}-->
                {if $index<3}
                      <li>
              <div class="e-info clearfix">
                 <div class="figure"><a target="_blank" href="{url user/space/$expert['uid']}"><img src="{$expert['avatar']}" alt=""></a></div>
                 <div class="other">
                   <p class="name"><a target="_blank" href="{url user/space/$expert['uid']}">{$expert['username']}{if
$expert['author_has_vertify']!=false}<i class="fa fa-vimeo v_person   " ></i><span>认证专家</span>{/if}</a></p>
                   <p class="inst">回答数量 : {$expert['answers']}个</p>
                   <p class="inst">获赞数 : {$expert['supports']}个</p>
                 </div>
              </div>
              <p class="article"></p>
           </li>
           {/if}
          <!--{/loop}-->             
                {if !$user['author_has_vertify']}    
           <a target="_blank" {if $user['uid']==0} href="javascript:login()" {else} href="{url user/vertify}" {/if} ><li><span class="renz">申请认证</span></li></a>
       {/if}
        </ul>
     </div>
             <div class="recommend bb hot-pro">
         <h3 class="title">等待帮助</h3>
         <ul class="r-list">
             <!--{eval $nosolvelist=$this->fromcache('nosolvelist');}-->
  <!--{loop $nosolvelist $index $question}-->
                       <li>
              <i></i><a target="_blank"  href="{url question/view/$question['id']}"  title=" {$question['title']}" class="tit">{$question['title']}</a>
                         </li>
                       <!--{/loop}-->
                      </ul>
     </div>
         

  </div><!-- r-aside end -->
</div>
{if $setting['weixin_logo']}
<div class="side-weixin-box">
  <div class="weixin-box-c"> 
    <div class="close" onclick="this.parentNode.parentNode.style.display='none';"></div>
<!--    <div class="content"> -->
<!--      <p>关注问答微信公众号</p>-->
<!--      <img src="{$setting['weixin_logo']}" alt="扫一扫，关注我们" width="111" height="111"> -->
<!--      -->
<!--    </div> -->
  </div>
</div>
{/if}
    <!--{template footer}-->


<script>
    !function(e, t, a) {
        function r() {
            for (var e = 0; e < s.length; e++) s[e].alpha <= 0 ? (t.body.removeChild(s[e].el), s.splice(e, 1)) : (s[e].y--, s[e].scale += .004, s[e].alpha -= .013, s[e].el.style.cssText = "left:" + s[e].x + "px;top:" + s[e].y + "px;opacity:" + s[e].alpha + ";transform:scale(" + s[e].scale + "," + s[e].scale + ") rotate(45deg);background:" + s[e].color + ";z-index:99999");
            requestAnimationFrame(r)
        }
        function n() {
            var t = "function" == typeof e.onclick && e.onclick;
            e.onclick = function(e) {
                t && t(),
                    o(e)
            }
        }
        function o(e) {
            var a = t.createElement("div");
            a.className = "heart",
                s.push({
                    el: a,
                    x: e.clientX - 5,
                    y: e.clientY - 5,
                    scale: 1,
                    alpha: 1,
                    color: c()
                }),
                t.body.appendChild(a)
        }
        function i(e) {
            var a = t.createElement("style");
            a.type = "text/css";
            try {
                a.appendChild(t.createTextNode(e))
            } catch(t) {
                a.styleSheet.cssText = e
            }
            t.getElementsByTagName("head")[0].appendChild(a)
        }
        function c() {
            return "rgb(" + ~~ (255 * Math.random()) + "," + ~~ (255 * Math.random()) + "," + ~~ (255 * Math.random()) + ")"
        }
        var s = [];
        e.requestAnimationFrame = e.requestAnimationFrame || e.webkitRequestAnimationFrame || e.mozRequestAnimationFrame || e.oRequestAnimationFrame || e.msRequestAnimationFrame ||
            function(e) {
                setTimeout(e, 1e3 / 60)
            },
            i(".heart{width: 10px;height: 10px;position: fixed;background: #f00;transform: rotate(45deg);-webkit-transform: rotate(45deg);-moz-transform: rotate(45deg);}.heart:after,.heart:before{content: '';width: inherit;height: inherit;background: inherit;border-radius: 50%;-webkit-border-radius: 50%;-moz-border-radius: 50%;position: fixed;}.heart:after{top: -5px;}.heart:before{left: -5px;}"),
            n(),
            r()
    } (window, document);
</script>