<aside class="col-md-4 blog-sidebar">
    <div class="p-3">
        <h4 class="font-italic">Leagues & Cups</h4>
      <?php if ($categories) : ?>
          <ol class="list-unstyled mb-0">
            <?php while ($row = $categories->fetch_assoc()) : ?>
                <li><a href="posts.php?category=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
            <?php endwhile; ?>
          </ol>
      <?php else : ?>
          <p>There are not categories yet</p>
      <?php endif; ?>

        <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">Contacts</h4>
            <p class="mb-0"><?php echo $contacts ?></p>
        </div>

</aside><!-- /.blog-sidebar -->

</div><!-- /.row -->

</main><!-- /.container -->

<footer class="blog-footer">
    <p>All rights reserved &copy; <?php echo date('d F Y'); ?>.</p>
    <p>
    <p>Made by <a
                href="https://www.facebook.com/profile.php?id=100017334785880">Rollins</a>
    </p>
    </p>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="/js/bootstrap.js"></script>
<script>
    Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
    });
</script>
</body>
</html>

