COST_LARGE = 6.00
COST_EXTRA_LARGE = 10.00
TOPPING_COSTS = {1: 1.00, 2: 1.75, 3: 2.50, 4: 3.35}
HST_RATE = 0.13

size = input("Enter pizza size (large or extra large): ").strip().lower()

if size == "large":
    base_cost = COST_LARGE
elif size == "extra large":
    base_cost = COST_EXTRA_LARGE
else:
    print("Invalid pizza size selected.")
    exit()

try:
    toppings = int(input("Enter number of toppings (1, 2, 3, or 4): "))
    if toppings not in TOPPING_COSTS:
        raise ValueError
except ValueError:
    print("Invalid number of toppings selected.")
    exit()

subtotal = base_cost + TOPPING_COSTS[toppings]
tax = subtotal * HST_RATE
total = subtotal + tax

print("Your selected size was: ",size)
print("Number of toppings: ",toppings)
print("Subtotal: $",subtotal)
print("Tax: $",tax)
print("Total: $",total)
