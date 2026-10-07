This is a project for my portfolio/personal page

# ABOUT FILES
    thyrogi/

        assets/
            folder for page assets

            audio/
             folder for audio files

            css/
             folder for general and page-specific css

               main_style.css
                the general css style used
                by pages with no theme

            fonts/
             folder for different fonts

            img/
             folder for images

            page_pieces/
             folder for reusable page parts

               footer.php
                footer section

               header.php
                header section

            rom/
             static data (read only memory)

               languages
                contains all of the text per languages

               default_settings.json
                includes the default server settings, which currently are:
                - default-language: english
                - theme: dark
                 
            rwm/
             malleable data (read write memory)

        js/
         contains the javascript scripts

        php/
         contains the php scripts

            json_handler.php
             includes functions to read and write into json files, as well as decode and encode functions
        
            server_config.php
             sets up server configurations such as filepaths

        public/
         all viewable pages

            project_pages/
             project specific pages

        index.php
         the main page

# CODING CONVENTIONS
## GENERAL
   ### FILE NAMES
   For file names, lower_snake_case is used.
   ex: tax_handler.php

   ### VARIABLES
   For variables, their capitalization depends on their type:

   if the variable is loose (aka, can be changed during
   calculations), it is camelCase
   ex: priceAfterTax

   if the variable is a constant (aka, cannot be changed
   during calculations), then it is UPPER_SNAKE_CASE
   ex: TAX_PRICE

   ### FUNCTIONS
   For functions, camelCase is used.
   ex: calculateTax()

   ### CLASSES
   For classes, PascalCase is used.
   ex: TaxTransaction

# HTML


# CSS


# PHP


# JS


# JSON
   All values inside json files use kebab-case, for example, inside
   usersettings.json, we have:
   '
    "default-language": "english",
    "theme": "dark"
   '
