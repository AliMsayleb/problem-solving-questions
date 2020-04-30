//Hi, here's your problem today. This problem was recently asked by Facebook:
//Two words can be 'chained' if the last character of the first word is the same as the first character of the second word.
//Given a list of words, determine if there is a way to 'chain' all the words in a circle.
//Example:
//Input: ['eggs', 'karat', 'apple', 'snack', 'tuna']
//Output: True

import java.util.HashMap;
import java.util.LinkedList;

public class ChainedWordsCircle
{
    public static boolean isChainedWords(String[] words)
    {
        if (words.length == 0) {
            return false;
        }

        HashMap<String, LinkedList<String>> mapList = new HashMap<>();
        LinkedList<String> list;
        int count = 1;
        for (String word: words) {
            if (mapList.containsKey(word.charAt(0)+"")) {
                list = mapList.get(word.charAt(0)+"");
                list.push(word);
            } else {
                list = new LinkedList<>();
                list.push(word);
                mapList.put(word.charAt(0)+"", list);
            }
        }
        char firstChar = words[0].charAt(0);
        list = mapList.get(firstChar + "");
        String currentWord = list.pop();
        if (list.isEmpty()) {
            mapList.remove(firstChar+"");
        }
        char currentChar = currentWord.charAt(currentWord.length() - 1);
        while (mapList.containsKey(currentChar+"")) {
            count++;
            list = mapList.get(currentChar + "");
            currentWord = list.removeFirst();
            if (list.isEmpty()) {
                mapList.remove(currentChar+"");
            }
            currentChar = currentWord.charAt(currentWord.length() - 1);
        }

        return currentChar == firstChar && count == words.length;
    }

    public static void main(String[] args)
    {
        System.out.println(isChainedWords(new String[]{"apple", "eggs", "snack", "karat", "tuna"}));
    }
}
