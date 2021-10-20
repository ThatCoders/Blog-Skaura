<?php

/**
 * Template Name: 说说/微语
 */

get_header(); ?>

    <style>
        body.theme-dark .cbp_tmtimeline::before {
            background: RGBA(255, 255, 255, 0.06)
        }

        ul.cbp_tmtimeline {
            padding: 0
        }

        div class.cdp_tmlabel > li .cbp_tmlabel {
            margin-bottom: 0
        }

        .cbp_tmtimeline {
            margin: 30px 0 0 0;
            padding: 0;
            list-style: none;
            position: relative
        }

        .cbp_tmtimeline > li .cbp_tmtime {
            display: block;
            max-width: 70px;
            position: absolute
        }

        .cbp_tmtimeline > li .cbp_tmtime span {
            display: block;
            text-align: right
        }

        .cbp_tmtimeline > li .cbp_tmtime span:first-child {
            font-size: 0.9em;
            color: #bdd0db
        }

        .cbp_tmtimeline > li .cbp_tmtime span:last-child {
            font-size: 1.2em;
            color: #9BCD9B
        }

        .cbp_tmtimeline > li:nth-child(odd) .cbp_tmtime span:last-child {
            color: RGBA(255, 125, 73, 0.75)
        }

        div.cbp_tmlabel > p {
            margin-bottom: 0
        }

        .cbp_tmtimeline > li .cbp_tmlabel {
            margin: 0 0 45px 65px;
            background: #24a0f0;
            color: #fff;
            padding: .8em 1.2em .4em 1.2em;
            font-weight: 300;
            line-height: 1.4;
            position: relative;
            border-radius: 5px;
            transition: all 0.3s ease 0s;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.15);
            cursor: pointer;
            display: block
        }

        .cbp_tmlabel:hover {
            transform: translateY(-3px);
            z-index: 1;
            -webkit-box-shadow: 0 15px 32px rgba(0, 0, 0, 0.15) !important
        }

        .cbp_tmtimeline > li:nth-child(odd) .cbp_tmlabel {
            background: #7878f0
        }

        .cbp_tmtimeline > li:nth-child(odd) .cbp_tmlabel:after {
            border-right-color: #7878f0
        }

        .cbp_tmtimeline > li .cbp_tmlabel:after {
            right: 100%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-right-color: #24a0f0;
            border-width: 10px;
            top: 4px
        }

        p.shuoshuo_time {
            margin-top: 10px;
            border-top: 1px dashed #fff;
            padding-top: 5px;
            font-family: Ubuntu
        }

        @media screen and (max-width: 65.375em) {
            .cbp_tmtimeline > li .cbp_tmtime span:last-child {
                font-size: 1.2em
            }
        }

        .shuoshuo_author_img img {
            border: 1px solid #ddd;
            padding: 2px;
            float: left;
            border-radius: 64px;
            transition: all 1.0s;
            height: 50px
        }

        .avatar {
            -webkit-border-radius: 100% !important;
            -moz-border-radius: 100% !important;
            box-shadow: inset 0 -1px 0 #3333sf;
            -webkit-box-shadow: inset 0 -1px 0 #3333sf;
            -webkit-transition: 0.4s;
            -webkit-transition: -webkit-transform 0.4s ease-out;
            transition: transform 0.4s ease-out;
            -moz-transition: -moz-transform 0.4s ease-out
        }

        .zhuan {
            transform: rotateZ(720deg);
            -webkit-transform: rotateZ(720deg);
            -moz-transform: rotateZ(720deg)
        }
    </style>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="cbp_shuoshuo">
                <?php
                query_posts("post_type=shuoshuo & post_status=publish & posts_per_page=-1");
                if (have_posts()) : ?>
                    <ul class="cbp_tmtimeline">
                        <?php
                        while (have_posts()) : the_post(); ?>
                            <li>
                                <span class="shuoshuo_author_img"><img
                                            src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>"
                                            class="avatar avatar-48" width="48" height="48"></span>
                                <a class="cbp_tmlabel" href="javascript:void(0)">
                                    <p></p>
                                    <p><?php the_content(); ?></p>
                                    <p></p>
                                    <p class="shuoshuo_time"><i
                                                class="fa fa-clock-o"></i> <?php the_time('Y年n月j日G:i'); ?></p>
                                </a>
                            </li>
                        <?php endwhile;
                        wp_reset_query();//重置查询
                        ?>
                    </ul>
                <?php
                else : ?>
                    <h3 style="text-align: center;">你还没有发表说说噢！</h3>
                    <p style="text-align: center;">赶快去发表你的第一条说说心情吧！</p>
                <?php
                endif; ?>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->
    <script type="text/javascript">
        (function () {
            var oldClass = "";
            var Obj = "";
            (".cbp_tmtimeline li").hover(function () {
                Obj = $(this).children(".shuoshuo_author_img");
                Obj = Obj.children("img");
                oldClass = Obj.attr("class");
                var newClass = oldClass + " zhuan";
                Obj.attr("class", newClass);
            }, function () {
                Obj.attr("class", oldClass);
            })
        })
    </script>
<?php
get_footer();
 