



<div class="col-sm-8 col-md-8 col-md-offset-2 main">



    <div class="table-responsive">
        <table class="table">


            <caption><h2>修改文章</h2></caption>
            <thead>
            <tr>
                <th>文章</th>
                <th>编辑</th>
                <th>删除</th>

            </tr>
            </thead>
            <tbody>

            <?php foreach ($rows as $value): ?>
                <tr>
                    <td><?php echo $value['title']?></td>
                    <td><a href="pagesedit/<?php echo $value['id']?>">编辑</a></td>
                    <td><a href="pagesedit/<?php echo $value['id']?>">删除</a></td>

                </tr>

            <?php endforeach ?>

            </tbody>
        </table>
    </div>

</div>
</div>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="http://v3.bootcss.com/assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="http://v3.bootcss.com/assets/js/vendor/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="http://v3.bootcss.com/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
