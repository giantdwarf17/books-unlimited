<!-- TASK 1: CONSTRUCT A WEBSITE LAYOUT -->

<!-- STEP 1: EDIT THE HEADER.PHP FILE -->
<?php include('header.php'); ?>

<!-- STEP 2: EDIT THE INDEX.PHP FILE -->
      <div class="container py-3">
        <section id="welcome">
            <h2 class="text-center">Welcome to Books Unlimited!</h2>
            <div class="row pb-3">
              <div class="col-4">
                <img src="https://s26162.pcdn.co/wp-content/uploads/sites/3/2023/02/used-books.jpg" class="img-fluid">
              </div>
              <div class="col-8">
                <p>At Books Unlimited, we believe that every story has the power to transport, transform, and inspire. Whether you're a lifelong reader or just starting your literary journey, our shelves are packed with a vast selection of books to suit every interest.</p>
              </div>
            </div>
        </section>

        <section id="collection">
            <h3>Explore Our Collection</h3>
            <ul>
                <li><strong><a href="browse.php?cat=new"> New Releases: </a></strong> Discover the latest titles hot off the press! We stock the freshest stories and ideas from bestselling authors and promising new voices across all genres.</li>
                <li><strong><a href="browse.php?cat=best-sellers"> Best Sellers: </a></strong> Find out what’s trending! Our curated list of best sellers is updated regularly, bringing you the most talked-about titles in fiction, non-fiction, mystery, romance, sci-fi, and more.</li>
                <li><strong><a href="browse.php?cat=staff-picks"> Staff Picks: </a></strong> Hand-picked favorites from our dedicated staff! We recommend these hidden gems for readers looking to discover something unique and meaningful.</li>
            </ul>
        </section>

        <section id="adventure">
            <h3>Your Next Adventure Awaits!</h3>
            <p>From timeless classics to contemporary favorites, our store is a haven for book lovers. Dive into our collection and let us help you find the next book you won’t be able to put down. Don’t miss our latest blog posts, author interviews, and event announcements to stay connected with the literary community.</p>
        </section>

        <section id="visit">
            <h3>Visit Us or Shop Online</h3>
            <p>With a growing online catalog and fast shipping options, Books Unlimited makes it easy to browse, buy, and enjoy books wherever you are. Visit us in-store for personalized recommendations, or explore our selection online for convenient, on-the-go access to your favorite titles.</p>
        </section>
      </div>

<!-- STEP 3: EDIT THE FOOTER.PHP FILE-->
<?php include('footer.php'); ?>