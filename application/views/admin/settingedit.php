

<div class="col-sm-8 col-md-8 col-md-offset-2 main">

    <form method="post" role="form">
        <div class="form-group">
            <label for="name"><h2>修改站点信息</h2></label>

            <p>站点名字</p><textarea name="sitename" class="form-control" rows="1"><?php echo $row->sitename; ?></textarea>


            <p>描述站点</p><textarea name="description" class="form-control" rows="15"><?php echo $row->description; ?></textarea>

            <button class="btn btn-lg btn-primary btn-block" type="submit">提交</button>

        </div>
    </form>


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
