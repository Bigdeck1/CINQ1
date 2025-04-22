import tkinter as tk
from tkinter import messagebox
import math

class TicTacToe:
    def __init__(self, master):
        self.master = master
        self.master.title("Tic Tac Toe")
        self.board = [[' ' for _ in range(3)] for _ in range(3)]
        self.buttons = [[None for _ in range(3)] for _ in range(3)]
        self.status_label = tk.Label(master, text="Player X's turn", font='Arial 14 bold')
        self.status_label.grid(row=0, column=0, columnspan=3)
        self.create_buttons()
        self.player_turn = True  # Player goes first (True for 'X', False for 'O')

    def create_buttons(self):
        for i in range(3):
            for j in range(3):
                button = tk.Button(self.master, text=' ', font='Arial 20 bold', width=5, height=2,
                                   command=lambda i=i, j=j: self.player_move(i, j))
                button.grid(row=i+1, column=j)
                self.buttons[i][j] = button

    def player_move(self, row, col):
        if self.board[row][col] == ' ' and self.player_turn:
            self.board[row][col] = 'X'
            self.buttons[row][col].config(text='X')
            self.player_turn = False
            self.status_label.config(text="Player O's turn")
            if not self.check_winner():
                self.master.after(500, self.computer_move)

    def computer_move(self):
        move = self.find_best_move(self.board)
        self.board[move[0]][move[1]] = 'O'
        self.buttons[move[0]][move[1]].config(text='O')
        self.player_turn = True
        self.status_label.config(text="Player X's turn")
        self.check_winner()

    def is_winning_move(self, move, player):
        test_board = [row[:] for row in self.board]
        test_board[move[0]][move[1]] = player
        return self.get_winner(test_board) == player

    def find_best_move_to_lose(self, board):
        best_score = math.inf
        best_move = None
        for i in range(3):
            for j in range(3):
                if board[i][j] == ' ':
                    board[i][j] = 'O'
                    score = self.minimax(board, 0, False)
                    board[i][j] = ' '
                    if score < best_score:
                        best_score = score
                        best_move = (i, j)
        return best_move

    def check_winner(self):
        winner = self.get_winner(self.board)
        if winner:
            if winner == 'Draw':
                self.status_label.config(text="It's a Draw!")
                messagebox.showinfo("Tic Tac Toe", "It's a Draw!")
            else:
                self.status_label.config(text=f"The winner is: {winner}")
                messagebox.showinfo("Tic Tac Toe", f"The winner is: {winner}")
            self.reset_game()
            return True
        return False

    def get_winner(self, board):
        for row in board:
            if row[0] == row[1] == row[2] and row[0] != ' ':
                return row[0]
        for col in range(3):
            if board[0][col] == board[1][col] == board[2][col] and board[0][col] != ' ':
                return board[0][col]
        if board[0][0] == board[1][1] == board[2][2] and board[0][0] != ' ':
            return board[0][0]
        if board[0][2] == board[1][1] == board[2][0] and board[0][2] != ' ':
            return board[0][2]
        for row in board:
            for cell in row:
                if cell == ' ':
                    return None
        return 'Draw'

    def minimax(self, board, depth, is_maximizing):
        winner = self.get_winner(board)
        if winner == 'X':
            return -1
        elif winner == 'O':
            return 1
        elif winner == 'Draw':
            return 0

        if is_maximizing:
            best_score = -math.inf
            for i in range(3):
                for j in range(3):
                    if board[i][j] == ' ':
                        board[i][j] = 'O'
                        score = self.minimax(board, depth + 1, False)
                        board[i][j] = ' '
                        best_score = max(score, best_score)
            return best_score
        else:
            best_score = math.inf
            for i in range(3):
                for j in range(3):
                    if board[i][j] == ' ':
                        board[i][j] = 'X'
                        score = self.minimax(board, depth + 1, True)
                        board[i][j] = ' '
                        best_score = min(score, best_score)
            return best_score

    def find_best_move(self, board):
        best_score = -math.inf
        best_move = None
        for i in range(3):
            for j in range(3):
                if board[i][j] == ' ':
                    board[i][j] = 'O'
                    score = self.minimax(board, 0, False)
                    board[i][j] = ' '
                    if score > best_score:
                        best_score = score
                        best_move = (i, j)
        return best_move

    def reset_game(self):
        self.board = [[' ' for _ in range(3)] for _ in range(3)]
        for i in range(3):
            for j in range(3):
                self.buttons[i][j].config(text=' ')
        self.player_turn = True
        self.status_label.config(text="Player X's turn")

if __name__ == "__main__":
    root = tk.Tk()
    game = TicTacToe(root)
    root.mainloop()
