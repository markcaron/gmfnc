<form action="/" method="get" class="search-form">
  <p>
    <label for="search">Search for:</label>
    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
  </p>
  <input type="submit" name="submit" class="btn" value="Search" />
</form>
