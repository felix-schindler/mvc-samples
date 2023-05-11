# Design Patterns - MVC

These sample apps are intended to demonstrate the MVC design pattern.

## Samples

Built with [GitHub/felix-schindler/Router](https://github.com/felix-schindler/Router) (PHP / Web) and [Xcode](https://developer.apple.com/xcode/) (Storyboard, Swift / iOS App).

### Running them

```bash
# Clone repo and open directory
git clone https://gitlab.mi.hdm-stuttgart.de/fs146/mvc-samples.git
cd mvc-samples

# PHP
cd php
php -S localhost:8080     # start dev server

# Swift (only on Mac!)
cd swift
open swift-mvc.xcodeproj  # open Xcode to run app
```

## Carbon Images

### PHP

- [UserModel](https://carbon.now.sh/?bg=rgba%28171%2C184%2C195%2C0%29&t=one-light&wt=none&l=text%2Fx-php&width=700&ds=true&dsyoff=0px&dsblur=20px&wc=true&wa=false&pv=56px&ph=56px&ln=false&fl=1&fm=Hack&fs=14px&lh=133%25&si=false&es=2x&wm=false&code=class%2520UserModel%2520extends%2520Model%2520%257B%250A%2520%2520public%2520static%2520get%28%2524id%29%2520%257B%250A%2520%2520%2520%2520return%2520%2524db-%253Equery%28%2522SELECT%2520*%2520FROM%2520users%2520WHERE%2520%2560id%2560%253D%2524id%253B%2522%29%250A%2520%2520%257D%250A%2520%2520%250A%2520%2520public%2520static%2520getList%28%29%2520%257B%250A%2520%2520%2520%2520return%2520%2524db-%253Equery%28%2522SELECT%2520*%2520FROM%2520users%253B%2522%29%250A%2520%2520%257D%250A%257D)
- [UserSingleView](https://carbon.now.sh/?bg=rgba%28171%2C184%2C195%2C0%29&t=one-light&wt=none&l=text%2Fx-php&width=450&ds=true&dsyoff=0px&dsblur=20px&wc=true&wa=false&pv=56px&ph=56px&ln=false&fl=1&fm=Hack&fs=14px&lh=133%25&si=false&es=2x&wm=false&code=class%2520UserSingleView%2520extends%2520View%2520%257B%250A%2520%2520__construct%28%250A%2520%2520%2520%2520private%2520%2524user%250A%2520%2520%29%2520%257B%257D%250A%2520%2520%250A%2520%2520public%2520function%2520render%28%29%2520%257B%250A%2509%253Ch1%253E%257B%2524user-%253Ename%257D%253C%252Fh1%253E%250A%2520%2520%2520%2520%253Cp%253E%257B%2524user-%253Ebio%257D%253C%252Fp%253E%250A%2520%2520%257D%250A%257D)
- [UserListView](https://carbon.now.sh/?bg=rgba%28171%2C184%2C195%2C0%29&t=one-light&wt=none&l=text%2Fx-php&width=475&ds=true&dsyoff=0px&dsblur=20px&wc=true&wa=false&pv=56px&ph=56px&ln=false&fl=1&fm=Hack&fs=14px&lh=133%25&si=false&es=2x&wm=false&code=class%2520UserListView%2520extends%2520View%2520%257B%250A%2520%2520__construct%28%250A%2520%2520%2520%2520private%2520%2524user%250A%2520%2520%29%2520%257B%257D%250A%2520%2520%250A%2520%2520public%2520function%2520render%28%29%2520%257B%250A%2520%2520%2520%2520%253Cul%253E%250A%2520%2520%2520%2520%2520%2520%257Bforeach%2520%2524users%2520as%2520%2524user%253A%257D%250A%2509%2520%2520%2520%2520%253Cli%253E%250A%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%253Ca%2520href%253D%2522%252Fusers%252F%257B%2524user-%253Eid%257D%2522%253E%250A%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%2520%257B%2524user-%253Ename%257D%250A%2520%2520%2520%2520%2509%2520%2520%253C%252Fa%253E%250A%2520%2520%2520%2520%2520%2520%2520%2520%253C%252Fli%253E%250A%2520%2520%2520%2520%2520%2520%257Bendforeach%257D%250A%2520%2520%2520%2520%253C%252Ful%253E%250A%2520%2520%257D%250A%257D)
- [UserController](https://carbon.now.sh/?bg=rgba%28171%2C184%2C195%2C0%29&t=one-light&wt=none&l=text%2Fx-php&width=550&ds=true&dsyoff=0px&dsblur=20px&wc=true&wa=false&pv=56px&ph=56px&ln=false&fl=1&fm=Hack&fs=14px&lh=133%25&si=false&es=2x&wm=false&code=class%2520UserController%2520extends%2520Controller%2520%257B%250A%2520%2520protected%2520%2524paths%2520%253D%2520%255B%2522%252Fusers%2522%252C%2520%2522%252Fusers%252F%253Aid%2522%255D%250A%250A%2520%2520protected%2520function%2520execute%28%29%253A%2520View%2520%257B%250A%2520%2520%2520%2520%2524id%2520%253D%2520%2524this-%253Eparam%28%2522id%2522%29%250A%250A%2520%2520%2520%2520if%2520%28%2524id%29%2520%257B%250A%2520%2520%2520%2520%2520%2520%2524user%2520%253D%2520UserModel.get%28%2524id%29%250A%2520%2520%2520%2520%2520%2520return%2520UserSingleView%28%2524user%29%250A%2520%2520%2520%2520%257D%2520else%2520%257B%250A%2520%2520%2520%2520%2520%2520%2524users%2520%253D%2520UserModel.getList%28%29%250A%2520%2520%2520%2520%2520%2520return%2520UserListView%28%2524users%29%250A%2520%2520%2520%2520%257D%250A%2520%2520%257D%250A%257D)

### Swift

- [UserModel](https://carbon.now.sh/?bg=rgba%28171%2C184%2C195%2C0%29&t=one-light&wt=none&l=swift&width=530&ds=true&dsyoff=0px&dsblur=20px&wc=true&wa=false&pv=56px&ph=56px&ln=false&fl=1&fm=Hack&fs=14px&lh=133%25&si=false&es=2x&wm=false&code=class%2520UserModel%253A%2520Model%2520%257B%250A%2520%2520public%2520static%2520get%28id%253A%2520String%29%2520%257B%250A%2520%2520%2520%2520return%2520API.get%28User.self%252C%2520%2522%252Fusers%252F%255C%28id%29%2522%29%250A%2520%2520%257D%250A%2520%2520%250A%2520%2520public%2520static%2520getList%28%29%2520%257B%250A%2520%2520%2520%2520return%2520API.get%28%255BUser%255D.self%252C%2520%2522%252Fusers%2522%29%250A%2520%2520%257D%250A%257D)
- [UserController](https://carbon.now.sh/?bg=rgba%28171%2C184%2C195%2C0%29&t=one-light&wt=none&l=swift&width=490&ds=true&dsyoff=0px&dsblur=20px&wc=true&wa=false&pv=56px&ph=56px&ln=false&fl=1&fm=Hack&fs=14px&lh=133%25&si=false&es=2x&wm=false&code=class%2520UserController%253A%2520UIViewController%2520%257B%250A%2520%2520%250A%2520%2520var%2520user%253A%2520User%253F%2520%253D%2520nil%250A%250A%2520%2520%2540IBOutlet%2520weak%2520var%2520idLabel%253A%2520UILabel%21%250A%2520%2520%2540IBOutlet%2520weak%2520var%2520bioLabel%253A%2520UILabel%21%250A%2520%2520%250A%2520%2520override%2520func%2520viewDidLoad%28%29%2520%257B%250A%2520%2520%2520%2520idLabel.text%2520%253D%2520%2522ID%253A%2520%255C%28user.id%29%2522%250A%2520%2520%2520%2520bioLabel.text%2520%253D%2520user.bio%250A%2520%2520%257D%250A%257D)
