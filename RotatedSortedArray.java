//Good morning! Here's your coding interview problem for today.
//This problem was asked by Amazon.
//An sorted array of integers was rotated an unknown number of times.
//Given such an array, find the index of the element in the array in faster than linear time.
//If the element doesn't exist in the array, return null.
//For example, given the array [13, 18, 25, 2, 8, 10] and the element 8, return 4 (the index of 8 in the array).
//You can assume all the integers in the array are unique.

// This implementation is of log n, faster than linear
public class RotatedSortedArray {
    public static Integer searchBinary(int[] elements, int start, int end, int element)
    {
        if (elements[start] == element) {
            return start;
        }

        if (elements[end] == element) {
            return end;
        }

        if (end == start || end == start + 1) {
            return null;
        }

        if (elements[(end + start) / 2] > element) {
            return searchBinary(elements, start, (end + start) / 2, element);
        } else {
            return searchBinary(elements, (end + start) / 2, end, element);
        }
    }

    public static Integer rotatedSortedArrayFind(int[] elements, int element)
    {
        int start = 0, end = elements.length - 1;
        while (start != end && start != end - 1) {
            if (elements[end] > elements[start]) {
                return searchBinary(elements, start, end, element);
            }
            if (element >= elements[start]) {
                if (element <= elements[(end + start) / 2]) {
                    return searchBinary(elements, start, (end + start) / 2, element);
                } else {
                    if (elements[(end + start) / 2] > elements[start]) {
                        start = (end + start) / 2;
                    } else {
                        end = (end + start) / 2;
                    }
                }
            } else {
                if (element >= elements[(end + start) / 2]) {
                    start = (end + start) / 2;
                } else {
                    if (elements[(end + start) / 2] > elements[start]) {
                        start = (end + start) / 2;
                    } else {
                        end = (end + start) / 2;
                    }
                }
            }
        }

        if (elements[start] == element) {
            return start;
        }

        if (elements[end] == element) {
            return end;
        }

        return null;
    }

    public static void main(String[] args)
    {
        int[] elements = {3, 4, 5, 6, 8, 9, 10, 1, 2};
        int[] elements2 = {8, 9, 10, 1, 2, 3, 4, 5, 6};
        for (int current: elements) {
            System.out.println("Position of " + current + " = " + rotatedSortedArrayFind(elements, current));
        }
        System.out.println("Position of 7 = " + rotatedSortedArrayFind(elements, 7));

        for (int current: elements2) {
            System.out.println("Position of " + current + " = " + rotatedSortedArrayFind(elements2, current));
        }
        System.out.println("Position of 7 = " + rotatedSortedArrayFind(elements2, 7));
    }
}
