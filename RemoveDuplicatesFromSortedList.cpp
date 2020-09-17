// Hi, here's your problem today. This problem was recently asked by Apple:
// Given a sorted list of size n, with m unique elements (thus m < n), modify the list such that the first m unique elements in the list will be sorted, ignoring the rest of the list.
// Your solution should have a space complexity of O(1). Instead of returning the list (since you are just modifying the original list), you should return what m is.
// Here's an example and some starter code.
// Example:
// nums = [1, 1, 2, 3, 4, 4, 4, 4, 4, 5, 5, 6, 7, 9]
// print(remove_dups(nums))
// # 8
// print(nums)
// # [1, 2, 3, 4, 5, 6, 7, 9]

#include <iostream>
#include <assert.h>
#include <vector>

int removeDuplicates(std::vector<int>& elements)
{
    if (elements.size() == 0) {
        return 0;
    }
    
    int lastValue = elements.at(0);
    int numberOfDistinctElements = 1;
    while (numberOfDistinctElements != elements.size()) {
        if (elements.at(numberOfDistinctElements) == lastValue) {
            elements.erase(elements.begin() + numberOfDistinctElements);
        } else {
            lastValue = elements.at(numberOfDistinctElements++);
        }
    }
    
    return numberOfDistinctElements;
}

int main()
{
    std::vector<int> elements;
    elements.push_back(1);
    elements.push_back(1);
    elements.push_back(2);
    elements.push_back(3);
    elements.push_back(4);
    elements.push_back(4);
    elements.push_back(4);
    elements.push_back(4);
    elements.push_back(4);
    elements.push_back(5);
    elements.push_back(5);
    elements.push_back(6);
    elements.push_back(7);
    elements.push_back(9);
    assert(14 == elements.size());
    assert(8 == removeDuplicates(elements));
    assert(1 == elements.at(0));
    assert(2 == elements.at(1));
    assert(3 == elements.at(2));
    assert(4 == elements.at(3));
    assert(5 == elements.at(4));
    assert(6 == elements.at(5));
    assert(7 == elements.at(6));
    assert(9 == elements.at(7));
    std::cout << "All is well" << std::endl;

    return 0;
}
