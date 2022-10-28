<?php
require_once ("CommonContent.php");

class CommentContent{

    /**
     * 解析文章页面的评论内容
     * @param $content
     * @param boolean $isLogin 是否登录
     * @param $rememberEmail
     * @param $currentEmail
     * @param $parentEmail
     * @param bool $isTime
     * @param bool $isPublic 当前评论是否已经审核通过
     * @return mixed
     */
    public static function postCommentContent($content, $isLogin, $rememberEmail, $currentEmail, $parentEmail, $isTime = false, $isPublic = true)
    {
        //解析私密评论
        $flag = true;
        if (strpos($content, '[secret]') !== false) {//提高效率，避免每篇文章都要解析
            $pattern = CommonContent::get_shortcode_regex(array('secret'));
            $content = preg_replace_callback("/$pattern/", function ($matches) use ($isPublic) {
                return Content::secretContentParseCallback($matches, $isPublic);
            }, $content);
            if ($isLogin || ($currentEmail == $rememberEmail && $currentEmail != "") || ($parentEmail == $rememberEmail && $rememberEmail != "")) {
                $flag = true;
            } else {
                $flag = false;
            }
        }
        if ($flag) {
            $content = ScodeContent::parseContentPublic($content);
            return $content;
        } else {
            if ($isTime) {
                return '<div class="commentReview">此条为私密说说，仅发布者可见</div>';
            } else {
                return '<div class="hideContent">该评论仅登录用户及评论双方可见</div>';
            }
        }
    }


}
