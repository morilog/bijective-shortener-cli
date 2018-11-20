# Bijective Shortener CLI

### Installation
```
composer global require morilog/bijective-shortener-cli
```

### Usage
#### Encode integer number
```
// With default characters set

$ bshort 200
// output: AF


// With custom characters set

$ bshort 200 --set-chars=abcdefg 
// output: eae 
```
#### Decode encoded number
```
// With default characters set

$ bshort AF --decode
// output: 200

// With custom characters set

$ bshort eae --decode --set-chars=abcdefg
// output: 200
```

For more information about Bijective shortener functionality, please see [Reshadman/Php-Bijective-Shortener](https://github.com/reshadman/php-bijective-shortener)