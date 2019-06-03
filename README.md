# SCG-PROJECT

SCG Assignment: Build-ready software run on browser (desktop only version)

to run

```sh

$ composer install

$ composer run --timeout=0 serve

```

navigate to http://localhost on your browser

## File Structure

1.  **Src**: backend code of ZF3 framework
2.  **vue**: frontend code, the build file will be put on **public** directory after build
3.  **data**: hold html cache file from backend

## (Optional) Building front-end from source

    cd vue
    npm install
    npm run serve #development
    npm run build #production (will put files on public folder)
