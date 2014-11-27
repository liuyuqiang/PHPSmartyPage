PHPSmartyPage
=============

PHP Smarty Page

Examples
---------

    $page = new Page( $record_total , $current_page , $page_size , $page_list_size);
    $page->getPageList();
    $this->pout['page'] = $page->result;

<<<<<<< HEAD
    <{if !empty($pout.page.page_list)}>
            <table>
                <tr>
                    <td>
                        共<{$pout.page.count}>条数据 每页<{$page.page_size}>条 共<{$pout.page.page_count}>页 当前第<{$pout.page.page}>页
                    </td>
                    <td>

                        <{if $pout.page.first eq 1}>
                            <a href="<{$pout.page.base_url}>" class="pageNum">首页</a>
                        <{else}>
                            <b>首页</b>
                        <{/if}>
                        <{if $pout.page.pre eq 1}>
                            <a href="<{$pout.page.base_url}>page=<{$pout.page.page-1}>" class="pageNum">上一页</a>
                        <{else}>
                            <b>上一页</b>
                        <{/if}>
                        <{foreach from=$pout.page.page_list item=vols}>
                            <{if $vols.link eq 1}>
                                <a href="<{$pout.page.base_url}>page=<{$vols.page}>" class="pageNum"><{$vols.page}></a>
                            <{else}>
                                <b><{$vols.page}></b>
                            <{/if}>
                        <{/foreach}>
                        <{if $pout.page.next eq 1}>
                            <a href="<{$pout.page.base_url}>page=<{$pout.page.page+1}>" class="pageNum">下一页</a>
                        <{else}>
                            <b>下一页</b>
                        <{/if}>
                        <{if $pout.page.last eq 1}>
                            <a href="<{$pout.page.base_url}>page=<{$pout.page.page_count}>" class="pageNum">尾页</a>
                        <{else}>
                            <b>尾页</b>
                        <{/if}>
                    </td>
                </tr>
            </table>
    <{/if}>
=======
    <table>
        <tr>
            <!--<td>-->
                <!--共<{$pout.page.count}>条数据 每页<{$page.page_size}>条 共<{$pout.page.page_count}>页 当前第<{$pout.page.page}>页-->
            <!--</td>-->
            <td>
                <{if $pout.page.first eq 1}>
                    <a href="<{$pout.page.base_url}>" class="pageNum">首页</a>
                <{else}>
                    <b>首页</b>
                <{/if}>
                <{if $pout.page.pre eq 1}>
                    <a href="<{$pout.page.base_url}>page=<{$pout.page.page-1}>" class="pageNum">上一页</a>
                <{else}>
                    <b>上一页</b>
                <{/if}>
                <{foreach from=$pout.page.page_list item=vols}>
                    <{if $vols.link eq 1}>
                        <a href="<{$pout.page.base_url}>page=<{$vols.page}>" class="pageNum"><{$vols.page}></a>
                    <{else}>
                        <b><{$vols.page}></b>
                    <{/if}>
                <{/foreach}>
                <{if $pout.page.next eq 1}>
                    <a href="<{$pout.page.base_url}>page=<{$pout.page.page+1}>" class="pageNum">下一页</a>
                <{else}>
                    <b>下一页</b>
                <{/if}>
                <{if $pout.page.last eq 1}>
                    <a href="<{$pout.page.base_url}>page=<{$pout.page.page_count}>" class="pageNum">尾页</a>
                <{else}>
                    <b>尾页</b>
                <{/if}>
            </td>
        </tr>
    </table>
>>>>>>> 42484eb04ac92bff59f98916df21c97c10369dcf
