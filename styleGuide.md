# General

## Naming Format
 **camelCase** should be applied to all instances that require naming: files, variables, and functions, etc.
```
mainPage.php
$numberOfStudents = 20;
getVote();
```
## Closing Tags
A closing tag should accompany all opening tags; make sure that they are lined up as well. 

*Tip: If your text editor does not do it automatically, always write out the closing tags. Also applies for braces or parenthesis*

### End of File (EOF)
Every file should contain one blank space and the very end to allow for easy expansion, if necessary
```php
<?php

  echo "Learn this style guide well!";

?>
    // One extra line at EOF
```

## Comments
Comments should be used ***frequently*** to remind future selves of the purpose of certain sections of code and debugging commands or previous ideas.

Every comment should have a space immediately after the signs are placed 
```php
exampleFunction(); // This function serves as an example for my style guide
``` 

## Formatting

* Line length MUST NOT exceed 100 characters unless it is text

* Line indentation MUST be accomplished using tabs

* Statements MUST be placed on their own line and MUST end with a semicolon
    * e.g. ``` welcomeMessage(); ```

* Operators MUST be surrounded by a space
    * e.g. ``` $difference= 4 - 1; ```

* Unary operators MUST be *attached* to their variable or integer
    * e.g. ``` $index++, --$index ```

* Concatenation period MUST be surrounded by a space
    * e.g. ``` echo "Read:" . $forumRules; ```
 
* Double quotes SHOULD be used
    * e.g. ``` echo "May ours be the noble heart."; ```

## HTML

### Boilerplate code
Every HTML file should include this basic heading. if you are using VScode, you can type 'h' and click on html5 in the suggestions.
```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
</body>
</html>
```

### `type` attributes (Google)

Omit type attributes for style sheets and scripts.

Do not use type attributes for style sheets (unless not using CSS) and scripts (unless not using JavaScript).

Specifying type attributes in these contexts is unnecessary as HTML5 implies text/css and text/javascript as defaults. This can be safely done even for older browsers.

```html
<!-- Not recommended -->
<link rel="stylesheet" href="https://www.google.com/css/maia.css"
    type="text/css">
<!-- Recommended -->
<link rel="stylesheet" href="https://www.google.com/css/maia.css">
```
### Formatting (Google)
Use a new line for every block, list, or table element, and indent every such child element.

Independent of the styling of an element (as CSS allows elements to assume a different role per display property), put every block, list, or table element on a new line.

Also, indent them if they are child elements of a block, list, or table element.

````html
<ul>
  <li>Moe
  <li>Larry
  <li>Curly
</ul>
`````

### Quotation Marks

When making class or id names for HTML elements, use double quotation marks("") instead of single quotes ('')

```html
<div class="container"></div>
```
## CSS/Bootstrap
Styles will mostly be managed through bootstrap. However, some vanilla CSS might be used.

### Block Declaration

Space between selector and block. The opening brace should be on the same line as the selector as well.

```css
#video {
  margin-top: 1em;
}
```

### Separate Block Declarations

Block declarations should be separated by one line of space.

```css
html {
  background: #fff;
}

body {
  margin: auto;
  width: 50%;
}
```
### Bootstrap
Refer to bootstrap documentation: https://getbootstrap.com/docs/5.1/getting-started/introduction/


## Javascript

### Variables 
Variables should only be declared using ```const``` or ```let``` when a variable needs to be reassigned.

```js
const foo = "bar";
let num = 2;
```
### Functions
Functions should be declared using the ES6 arrow function

```js
let addNumbers = (num1, num2) => {
    return num1 + num2
}
```
### Array Formatting
Elements when declaring an array should be followed by a linebreak

```js
const animals = [
    "pig",
    "dog",
    "lion"
]; 
```

###
## PHP

## SQL
Root keywords should always be capitalized (SELECT, FROM, WHERE, AS, booleans, etc.)

```sql
SELECT * FROM allConstituents AS ac WHERE constituentID = 3;

```

Thanks! :thumbsup:
