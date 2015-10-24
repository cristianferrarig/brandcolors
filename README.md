## Sass Function for Brand Colors

A Sass module containing a function that return a especific color found on [Brand Colors](http://brandcolors.net/ "Brand Colors").

### Usage
1. Include the module:

    ```
    @include "brandcolors";
    ```
2. Use the function:

    ```
    .twitter-button {
        background: brandcolor(twitter);
    }

    .amazon-link {
        color: brandcolor(amazon,2);
    }
    ```
    You can write the names with spaces, dash or underscore.
    ```
    .class {
        color: brandcolor("angie's list");
        color: brandcolor(angies list);
        color: brandcolor(angies-list);
        color: brandcolor(angies_list);
    }
    ```

### Credits
- Sass module by [Cristian Ferrari](http://www.cristianferrari.com/ "Cristian Ferrari")
- [Brand Colors](http://brandcolors.net/ "Brand Colors") by [Galen Gidman](http://galengidman.com/ "Galen Gidman")

### License
[MIT](http://opensource.org/licenses/MIT "MIT")