// Hi, here's your problem today. This problem was recently asked by Amazon:
// Given an integer, reverse the digits. Do not convert the integer into a string and reverse it.
// Here's some examples and some starter code.

// def reverse_integer(num):
//   # Fill this in.

// print(reverse_integer(135))
// # 531

// print(reverse_integer(-321))
// # -123

#include <iostream>

int reverse_integer(int number)
{
    int result = 0;
    bool negative = number < 0;
    number = abs(number);
    while (number > 0) {
        result *= 10;
        result += number % 10;
        number /= 10;
    }
    
    return negative ? result * -1 : result;
}

int main()
{
    std::cout<< reverse_integer(135) << std::endl;
    std::cout<< reverse_integer(-321) << std::endl;
    std::cout<< reverse_integer(-4) << std::endl;

    return 0;
}
