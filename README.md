# Component: `coupons`

Provides a system to manage coupons. The simple intent of this component is.
Additional features that are common can be provided without having to reïnvent the wheel.
Think features like logging / tracking when coupons are used, generation of unique codes,
QR codes, etc...


## How to implement

The coupons component currently provides no actions based on a coupon.
You should integrate the coupon management into your own component to provide actions based on them.
For example: to enable discount coupons in component `webshop` the `webshop` component implements
all the discounting logic.


### 1. Register a coupon type

...

### 2. Implement your coupon logic

... (use optional utilities)

### 3. Manage coupons

...