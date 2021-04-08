// Good morning! Here's your coding interview problem for today.
// This problem was asked by Twitter.
// A permutation can be specified by an array P, where P[i] represents the location of the element at i in the permutation.
// For example, [2, 1, 0] represents the permutation where elements at the index 0 and 2 are swapped.
// Given an array and a permutation, apply the permutation to the array. 
// For example, given the array ["a", "b", "c"] and the permutation [2, 1, 0], return ["c", "b", "a"].
public class Main
{
    public static <T> void getOriginalFromPermutationInPlace(T[] elements, Integer[] permutations) {
        for (int i = 0; i < permutations.length; ++i) {
            while (permutations[i] != i) {
                swap(elements, i, permutations[i]);
                swap(permutations, i, permutations[i]);
            }
        }
    }
    
    public static <E> void swap(E[] x, int i, int j) {
        E temp = x[i];
        x[i] = x[j];
        x[j] = temp;
    }
    
	public static void main(String[] args) {
	    Character[] elements = new Character[3];
	    elements[0] = 'a';
	    elements[1] = 'b';
	    elements[2] = 'c';
	    Integer [] permutations = new Integer[3];
	    permutations[0] = 2;
	    permutations[1] = 1;
	    permutations[2] = 0;
	    
	    System.out.println("Before:");
	    for (int i = 0; i < elements.length; ++i) {
	        System.out.println(elements[i]);
	    }
	    
	    getOriginalFromPermutationInPlace(elements, permutations);
	    
	    System.out.println("After:");
	    for (int i = 0; i < elements.length; ++i) {
	        System.out.println(elements[i]);
	    }
	}
}
